<template>
  <bg-white-template>
    <template slot="content">
      <div class="infos">
        <div class="item">
          <div v-if="mentor_infos" class="info">
            <div class="title">
              Aktif Mentee Sayısı
            </div>
            <div class="value">
              {{ mentor_infos.active_mentee_count }}
            </div>
          </div>
          <div class="icon">
            <i class="fas fa-users"></i>
          </div>
        </div>
      </div>
      <ul class="mentor_mentee_programs_list">
        <router-link
            tag="li"
            :to="{name:'MeActiveProgramDetail',params:{id:program.id}}"
            v-for="(program,index) in programs"
            :key="index">
          {{ program.id }}
          <div v-if="program.is_mentor" class="mentor_tooltip">
            <tooltip
                icon='<i class="fas fa-star"></i>'
                text="Bu programda sen mentorsun"/>
          </div>
          <div class="program_info">
            <div class="mentor">
              <div class="title">
                Mentor
              </div>
              <div class="user">
                <img :src="program.mentor.image">
                <div class="name">
                  {{ program.mentor.name }}
                </div>
                <div class="username">
                  @{{ program.mentor.username }}
                </div>
              </div>
            </div>
            <div class="time">
              <i class="fas fa-hourglass-half"></i>
              <span v-if="program.passing_time>0">{{ program.passing_time }} gün</span>
              <span v-else>yeni program!</span>
            </div>
            <div class="mentee">
              <div class="title">
                Mentee
              </div>
              <div class="user">
                <img :src="program.mentee.image">
                <div class="name">
                  {{ program.mentee.name }}
                </div>
                <div class="username">
                  @{{ program.mentee.username }}
                </div>
              </div>
            </div>
          </div>
        </router-link>
      </ul>
    </template>
  </bg-white-template>
</template>

<script>
export default {
  name: "Home",
  data() {
    return {
      programs: [],
      mentor_infos: {}
    }
  },
  components: {
    BgWhiteTemplate: () => import('@/components/pages/shared/BgWhiteTemplate'),
    Tooltip: () => import('@/components/pages/shared/Tooltip'),
  },
  methods: {
    getMentorMenteePrograms() {
      this.$store.dispatch('getMentorMenteePrograms').then(res => {
        this.programs = res.programs;
        this.mentor_infos = res.mentor_infos;
      });
    }
  },
  created() {
    this.getMentorMenteePrograms()
  }
}
</script>

<style scoped>

.infos {
  display: flex;
}

.infos > .item {
  display: flex;
  padding: 10px;
  border-radius: 5px;
  background-color: #f6f6f6;
  color: var(--navy-blue-text-color);
}

.infos > .item > .icon {
  margin-left: 10px;
  font-size: 40px;
}

.infos > .item > .info {
  display: flex;
  flex-direction: column;
}

.infos > .item > .info > .title {
  font-family: 'Rubik', sans-serif;
  font-weight: 500;
  font-size: 13px;
  color: var(--navy-blue-text-light-color);
}

.infos > .item > .info > .value {
  font-family: 'Poppins', sans-serif;
  font-size: 23px;
}

.mentor_mentee_programs_list {
  list-style-type: none;
  padding: 0;
  display: flex;
  justify-content: space-between;
  flex-wrap: wrap;
}

.mentor_mentee_programs_list > li {
  width: 45%;
  border: 1px solid #eaeaea;
  border-radius: 5px;
  padding: 15px 25px;
  transition: .3s;
  position: relative;
  margin: 13px 0;
}

.mentor_mentee_programs_list > li:hover {
  cursor: pointer;
  transform: scale(1.01);
  box-shadow: 0 0px 0.1px rgba(0, 0, 0, 0.017),
  0 0px 0.3px rgba(0, 0, 0, 0.024),
  0 0px 0.6px rgba(0, 0, 0, 0.03),
  0 0px 1.1px rgba(0, 0, 0, 0.036),
  0 0px 2.1px rgba(0, 0, 0, 0.043),
  0 0px 5px rgba(0, 0, 0, 0.06);

}

.mentor_mentee_programs_list > li > .program_info {
  display: flex;
  justify-content: space-around;
  align-items: center;
}

.mentor_mentee_programs_list > li .title {
  font-family: 'Rubik', sans-serif;
  font-weight: 500;
  text-align: center;
  color: var(--navy-blue-text-color);
}

.mentor_mentee_programs_list > li .user {
  display: flex;
  flex-direction: column;
  align-items: center;
  margin-top: 7px;
}

.mentor_mentee_programs_list > li .user > img {
  width: 50px;
  border-radius: var(--navy-user-profile-border-radius);
}

.mentor_mentee_programs_list > li .user > .name {
  font-family: 'Montserrat', sans-serif;
  font-size: 15px;
  margin-top: 3px;
}

.mentor_mentee_programs_list > li .user > .username {
  font-family: 'Poppins', sans-serif;
  font-size: 13px;
  color: var(--navy-mentor-mentee-text-color);
}

.mentor_mentee_programs_list > li .time {
  display: flex;
  flex-direction: column;
  align-items: center;
  color: var(--navy-red-txt-color);
}

.mentor_mentee_programs_list > li .time > span {
  padding: 3px 7px;
  border-radius: 20px;
  margin-top: 6px;
  font-family: 'Poppins', sans-serif;
  font-size: 13px;
  background-color: #fff1ee;
}

.mentor_mentee_programs_list > li > .mentor_tooltip {
  position: absolute;
  left: 8px;
  top: 8px;
}
</style>