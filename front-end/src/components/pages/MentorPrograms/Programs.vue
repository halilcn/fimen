<template>
  <div class="programs_container">
    <new-program-form
        :showPopup="isShowNewProgramPopup"
        :popupHeight="50"
        :title="'Yeni Mentor Programı'"/>
    <div class="mentor_programs">
      <div class="filters">
        <div :class="{selected:isShowCompetencies}" class="competency_selection">
            <span @click="isShowCompetencies=!isShowCompetencies">
              Mentorluk Alanı
              <i class="bi bi-caret-down"></i>
            </span>
          <div v-show="isShowCompetencies" class="dropdown">
            <small-checkbox
                v-for="(competency,index) in competencies"
                :key="index"
                :text="competency.name"
                :id="'competency'+index"
                @inputClick="actionFilterCompetencies(competency.id)"
            />
          </div>
        </div>
        <div @click="$store.commit('setShowPopup',true)" class="create_mentor_program">
          Yeni Program Oluştur
        </div>
      </div>
      <ul>
        <loader-content v-if="isLoadingPrograms"
                        :textLineCount="3"
                        :textCount="8"
                        :textLineHeight="15"/>
        <router-link
            v-for="(program,index) in programs"
            :key="index"
            tag="li"
            :to="{name:'MentorProgramDetail',params:{slug:program.slug}}"
            :class="{'expired':!program.deadline}">
          <div class="infos">
            <div class="type">
              <i class="bi bi-list"></i>
              {{ program.user.competency_name }}
            </div>
            <div class="user_count">
              <i class="bi bi-people"></i>
              {{ program.mentee_count }} kişi
            </div>
            <div
                class="last_date"
                :class="{expired_date:!program.deadline}">
              <i class="bi bi-clock"></i>
              <template v-if="program.deadline">
                {{ moment(program.deadline).format('DD MMMM') }}
              </template>
              <template v-else>
                sona erdi
              </template>
            </div>
          </div>
          <div class="inner">
            <div class="profile">
              <img :src="program.user.image">
              <div class="name_surname">
                {{ program.user.name }}
              </div>
              <div class="username">
                @{{ program.user.username }}
              </div>
            </div>
            <div class="program_info">
              <div class="title">
                {{ program.title }}
              </div>
              <div class="text">
                {{ program.explanation }}
              </div>
            </div>
          </div>
        </router-link>
      </ul>
      <template v-if="programs.length > 0">
        <div v-if="isShowMoreButton" @click="getMoreMentors" class="more_button">
          daha fazla yükle
        </div>
      </template>
      <template v-else>
        <div class="no_program">
          Hiç mentorluk programı yok.
        </div>
      </template>
    </div>
    <div class="new_mentors">
      <div class="title">
        Yeni Mentorlar
      </div>
      <ul>
        <loader-content v-if="isLoadingNewMentors"/>
        <router-link
            tag="li"
            to="/"
            v-for="(mentor,index) in newMentors"
            :key="index">
          <img :src="mentor.image">
          <div class="user_info">
            <div class="name_surname">
              {{ mentor.name }}
            </div>
            <div class="type">
              <i class="bi bi-circle-fill"></i>
              {{ mentor.competency_name }}
            </div>
          </div>
        </router-link>
      </ul>
    </div>
  </div>
</template>

<script>
import {mapState} from 'vuex'

export default {
  name: "Programs",
  data() {
    return {
      isShowCompetencies: false,
      isShowProgramStatus: false,
      isLoadingNewMentors: true,
      isLoadingPrograms: true,
      isShowNewProgramPopup: false,
      newMentors: [],
      isShowMoreButton: true,
      filters: {
        competencies: [],
        lastProgramDeadline: 'now'
      }
    }
  },
  components: {
    SmallCheckbox: () => import('@/components/pages/shared/elements/SmallCheckbox'),
    LoaderContent: () => import('@/components/pages/shared/LoaderContent'),
    NewProgramForm: () => import('@/components/pages/MentorPrograms/NewProgramForm')
  },
  methods: {
    getMentorPrograms() {
      this.isShowMoreButton = true;
      this.$store.dispatch('getMentorPrograms', this.filters)
          .finally(() => {
            this.isLoadingPrograms = false;
          });
    },
    getMoreMentors() {
      this.$store.dispatch('getMoreMentorPrograms', this.filters)
          .then(res => {
            if (res) {
              this.isShowMoreButton = false;
            }
          })
    },
    actionFilterCompetencies(id) {
      const index = this.filters.competencies.indexOf(id);
      index > -1 ? this.filters.competencies.splice(index, 1) : this.filters.competencies.push(id);
      this.getMentorPrograms();
    },
  },
  computed: {
    ...mapState({
      programs: state => state.mentorProgram.programs,
      competencies: state => state.mentor.competencies,
    }),
  },
  created() {
    this.getMentorPrograms();
    this.$store.dispatch('getNewMentors')
        .then(res => {
          this.newMentors = res;
        })
        .finally(() => {
          this.isLoadingNewMentors = false;
        });
    this.$store.dispatch('getCompetencies');
  }
}
</script>

<style scoped>
.programs_container {
  display: flex;
  align-items: flex-start;
}

.mentor_programs {
  width: 100%;
  padding: 0 20px;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
}

.mentor_programs > .filters {
  width: 100%;
  display: flex;
  align-items: center;
  padding: 10px 10px;
  position: sticky;
  top: 0;
  z-index: 2;
  background-color: #F2F2F8;
  border: 1px solid #ececf8;
  border-radius: 3px;
  margin-bottom: 30px;

  box-shadow: 0 0.1px 0.5px rgba(0, 0, 0, 0.011),
  0 0.3px 1.3px rgba(0, 0, 0, 0.016),
  0 0.5px 2.4px rgba(0, 0, 0, 0.02),
  0 0.9px 4.2px rgba(0, 0, 0, 0.024),
  0 1.7px 7.9px rgba(0, 0, 0, 0.029),
  0 4px 19px rgba(0, 0, 0, 0.04);
}

.mentor_programs > .filters > div {
  position: relative;
  margin-right: 20px;
}

.mentor_programs > .filters > div:hover {
  background-color: #e9e9f3;
}

.mentor_programs > .filters > .selected {
  background-color: #e9e9f3;
}

.mentor_programs > .filters > .selected > span > i {
  transform: rotate(180deg);
}

.mentor_programs > .filters > div > span {
  display: flex;
  flex-wrap: wrap;
  align-content: center;
  padding: 7px;
  cursor: pointer;
  font-family: 'Poppins', sans-serif;
  font-size: 12px;
  border-radius: 3px;
  transition: .3s;
}

.mentor_programs > .filters > div > span > i {
  margin-left: 3px;
}

.mentor_programs > .filters > div > .dropdown {
  position: absolute;
  background-color: white;
  width: 100%;
  max-height: 200px;
  left: 0;
  top: 30px;
  overflow-x: auto;
  padding: 5px;
  border: 1px solid #dddddd;
  border-radius: 4px;
}

.mentor_programs > .filters > div > .dropdown > div {
  padding: 6px;
  border-radius: 3px;
  cursor: pointer;
}

.mentor_programs > .filters > div > .dropdown > div:hover {
  background-color: #f2f2f8;
}

.mentor_programs > .filters > .create_mentor_program {
  margin-left: auto;
  background-color: var(--navy-red-bg-color);
  color: white;
  padding: 7px 10px;
  font-family: 'Poppins', sans-serif;
  font-size: 12px;
  border-radius: 3px;
  cursor: pointer;
}

.mentor_programs > .filters > .create_mentor_program:hover {
  background-color: var(--navy-red-bg-dark-color);
}


.mentor_programs > ul {
  list-style: none;
  padding: 0px;
  width: 100%;
}

.mentor_programs > ul > li {
  padding: 10px 20px;
  cursor: pointer;
  border: 1px solid #f3f3f3;
  border-radius: 4px;
  transition: .3s;
  margin-bottom: 30px;

  box-shadow: 0 0px 0.3px rgba(0, 0, 0, 0.011),
  0 0px 0.7px rgba(0, 0, 0, 0.016),
  0 0px 1.3px rgba(0, 0, 0, 0.02),
  0 0px 2.2px rgba(0, 0, 0, 0.024),
  0 0px 4.2px rgba(0, 0, 0, 0.029),
  0 0px 10px rgba(0, 0, 0, 0.04);

}

.mentor_programs > ul > .expired {
  pointer-events: none;
  opacity: .6;
}

.mentor_programs > ul > li:hover {
  transform: translateY(-2px);
  box-shadow: 0 0px 0.3px rgba(0, 0, 0, 0.02),
  0 0px 0.7px rgba(0, 0, 0, 0.028),
  0 0px 1.3px rgba(0, 0, 0, 0.035),
  0 0px 2.2px rgba(0, 0, 0, 0.042),
  0 0px 4.2px rgba(0, 0, 0, 0.05),
  0 0px 10px rgba(0, 0, 0, 0.07);

}

.mentor_programs > ul > li > .infos {
  display: flex;
}

.mentor_programs > ul > li > .infos > div {
  margin-right: 17px;
  padding: 3px 8px;
  border-radius: 10px;
  font-family: 'Montserrat', 'sans-serif';
  font-size: 11px;
  background-color: #f3f3f3;
}

.mentor_programs > ul > li > .infos > .expired_date {
  background-color: #cf2222;
  color: white;
}

.mentor_programs > ul > li > .inner {
  display: flex;
  justify-content: flex-start;
  margin-top: 13px;
}

.mentor_programs > ul > li > .inner > .profile {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.mentor_programs > ul > li > .inner > .profile > img {
  width: 60px;
  border-radius: var(--navy-user-profile-border-radius);
}

.mentor_programs > ul > li > .inner > .profile > .name_surname {
  font-family: 'Poppins', sans-serif;
  font-size: 12px;
  margin-top: 5px;
  color: var(--navy-blue-text-color);
}

.mentor_programs > ul > li > .inner > .profile > .username {
  font-family: 'Montserrat', sans-serif;
  font-size: 12px;
  color: #2972cf;
}

.mentor_programs > ul > li > .inner > .program_info {
  padding-left: 20px;
}

.mentor_programs > ul > li > .inner > .program_info > .title {
  font-family: 'Poppins', sans-serif;
  font-weight: 500;
  font-size: 15px;
}

.mentor_programs > ul > li > .inner > .program_info > .text {
  font-family: 'Montserrat', 'sans-serif';
  font-size: 13px;
  margin-top: 5px;
}

.mentor_programs > .no_program {
  font-family: 'Rubik', sans-serif;
  font-size: 14px;
  width: 100%;
  text-align: center;
  margin-bottom: 30px;
  padding: 13px 0;
  background-color: #f6f6f6;
  border-radius: 3px;
}

.mentor_programs > .more_button {
  padding: 7px 13px;
  border-radius: 4px;
  cursor: pointer;
  font-family: 'Poppins', sans-serif;
  font-size: 12px;
  align-self: center;
  background-color: #e9eaec;
  color: var(--navy-blue-text-color);
}

.mentor_programs > .more_button:hover {
  background-color: #e1e3e7;
}

.new_mentors {
  width: 350px;
  margin-left: 10px;
  border-radius: 3px;
  background-color: #fafafd;
  border: 1px solid #ebebf5;
}

.new_mentors > .title {
  font-family: 'Poppins', sans-serif;
  font-size: 18px;
  text-align: center;
  border-radius: 3px;
  border-bottom: 1px solid #dedeec;
  background-color: #F2F2F8;
  padding: 6px 0;
}

.new_mentors > ul {
  list-style: none;
  padding: 0;
  background-color: #f5f5f5;
  margin: 0;
}

.new_mentors > ul > li {
  display: flex;
  justify-content: flex-start;
  padding: 13px 10px;
  border-radius: 4px;
  cursor: pointer;
  transition: .3s;
}

.new_mentors > ul > li:hover {
  background-color: #efeff6;
}

.new_mentors > ul > li > img {
  width: 40px;
  border-radius: var(--navy-user-profile-border-radius);
}

.new_mentors > ul > li > .user_info {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: flex-start;
  margin-left: 9px;
}

.new_mentors > ul > li > .user_info > .name_surname {
  font-family: 'Poppins', sans-serif;
  color: var(--navy-blue-text-color);
}

.new_mentors > ul > li > .user_info > .type {
  font-family: 'Montserrat', sans-serif;
  font-size: 12px;
  display: flex;
  align-items: center;
}

.new_mentors > ul > li > .user_info > .type > i {
  font-size: 5px;
  margin-right: 3px;
}
</style>