<template>
  <div>
    <page-title :text="' Mentor Programları'"/>
    <div class="content">
      <div class="mentor_programs">
        <div class="filters">
          <div :class="{selected:isShowCompetencies}" class="competency_selection">
            <span @click="isShowCompetencies=!isShowCompetencies">
              Mentorluk Alanı
              <i class="bi bi-caret-down"></i>
            </span>
            <div v-if="isShowCompetencies" class="dropdown">
              <small-checkbox
                  v-for="(index) in 10"
                  :key="index"
                  :text="'asdas'"
                  :id="index"/>
            </div>
          </div>
          <div class="program_status">
           <span @click="isShowProgramStatus=!isShowProgramStatus">
              Program Durumu
             <i class="bi bi-caret-down"></i>
           </span>
            <div v-if="isShowProgramStatus" class="dropdown">
              <small-checkbox
                  v-for="(index) in 2"
                  :key="index"
                  :text="'asdas'"
                  :id="index"/>
            </div>
          </div>
          <div class="create_mentor_program">
            Yeni Program Oluştur
          </div>
        </div>
        <ul>
          <li class="expired">
            <div class="infos">
              <div class="type">
                <i class="bi bi-list"></i>
                yazılım
              </div>
              <div class="user_count">
                <i class="bi bi-people"></i>
                2 kişi
              </div>
              <div class="last_date expired_date">
                <i class="bi bi-clock"></i>
                sona erdi
              </div>
            </div>
            <div class="inner">
              <div class="profile">
                <img
                    src="https://ui-avatars.com/api/?name=halil+can&amp;background=0288D1&amp;color=FFFFFF&amp;size=128">
                <div class="name_surname">
                  Halil CAN
                </div>
                <div class="username">
                  @hcan
                </div>
              </div>
              <div class="program_info">
                <div class="title">
                  başlık başlıkbaşlıkbaşlık başlık başlık
                </div>
                <div class="text">
                  başlık başlıkbaşlıkbaşlık başlık başlıkbaşlık başlıkbaşlıkbaşlık başlık başlıkbaşlık
                  başlıkbaşlıkbaşlık başlık başlık
                  başlık başlıkbaşlıkbaşlık başlık başlık
                  başlık başlıkbaşlıkbaşlık başlık başlıkbaşlık başlıkbaşlıkbaşlık başlık başlıkbaşlık
                  başlıkbaşlıkbaşlık başlık başlık
                  başlık başlıkbaşlıkbaşlık başlık başlık
                </div>
              </div>
            </div>
          </li>
          <li>
            <div class="infos">
              <div class="type">
                <i class="bi bi-list"></i>
                yazılım
              </div>
              <div class="user_count">
                <i class="bi bi-people"></i>
                2 kişi
              </div>
              <div class="last_date">
                <i class="bi bi-clock"></i>
                sona erdi
              </div>
            </div>
            <div class="inner">
              <div class="profile">
                <img
                    src="https://ui-avatars.com/api/?name=halil+can&amp;background=0288D1&amp;color=FFFFFF&amp;size=128">
                <div class="name_surname">
                  Halil CAN
                </div>
                <div class="username">
                  @hcan
                </div>
              </div>
              <div class="program_info">
                <div class="title">
                  başlık başlıkbaşlıkbaşlık başlık başlık
                </div>
                <div class="text">
                  başlık başlıkbaşlıkbaşlık başlık başlıkbaşlık başlıkbaşlıkbaşlık başlık başlıkbaşlık
                  başlıkbaşlıkbaşlık başlık başlık
                  başlık başlıkbaşlıkbaşlık başlık başlık
                  başlık başlıkbaşlıkbaşlık başlık başlıkbaşlık başlıkbaşlıkbaşlık başlık başlıkbaşlık
                  başlıkbaşlıkbaşlık başlık başlık
                  başlık başlıkbaşlıkbaşlık başlık başlık
                  başlık başlıkbaşlıkbaşlık başlık başlıkbaşlık başlıkbaşlıkbaşlık başlık başlıkbaşlık
                  başlıkbaşlıkbaşlık başlık başlık
                  başlık başlıkbaşlıkbaşlık başlık başlık
                </div>
              </div>
            </div>
          </li>
          <li>
            <div class="infos">
              <div class="type">
                <i class="bi bi-alarm"></i>
                yazılım
              </div>
              <div class="user_count">
                <i class="bi bi-people"></i>
                2 kişi
              </div>
              <div class="last_date">
                <i class="bi bi-clock"></i>
                26 ekim
              </div>
            </div>
            <div class="inner">
              <div class="profile">
                <img
                    src="https://ui-avatars.com/api/?name=halil+can&amp;background=0288D1&amp;color=FFFFFF&amp;size=128">
                <div class="name_surname">
                  Halil CAN
                </div>
                <div class="username">
                  @hcan
                </div>
              </div>
              <div class="program_info">
                <div class="title">
                  başlık başlıkbaşlıkbaşlık başlık başlık
                </div>
                <div class="text">
                  başlık başlıkbaşlıkbaşlık başlık başlıkbaşlık başlıkbaşlıkbaşlık başlık başlıkbaşlık
                  başlıkbaşlıkbaşlık başlık başlık
                  başlık başlıkbaşlıkbaşlık başlık başlık
                  başlık başlıkbaşlıkbaşlık başlık başlıkbaşlık başlıkbaşlıkbaşlık başlık başlıkbaşlık
                  başlıkbaşlıkbaşlık başlık başlık
                  başlık başlıkbaşlıkbaşlık başlık başlık
                  başlık başlıkbaşlıkbaşlık başlık başlıkbaşlık başlıkbaşlıkbaşlık başlık başlıkbaşlık
                  başlıkbaşlıkbaşlık başlık başlık
                  başlık başlıkbaşlıkbaşlık başlık başlık
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>
      <div class="new_mentors">
        <div class="title">
          Yeni Mentorlar
        </div>
        <ul>
          <li>
            <img src="https://ui-avatars.com/api/?name=halil+can&amp;background=0288D1&amp;color=FFFFFF&amp;size=128">
            <div class="user_info">
              <div class="name_surname">
                Halil CAN
              </div>
              <div class="type">
                <i class="bi bi-circle-fill"></i>
                yazılım
              </div>
            </div>
          </li>
          <li>
            <img src="https://ui-avatars.com/api/?name=halil+can&amp;background=0288D1&amp;color=FFFFFF&amp;size=128">
            <div class="user_info">
              <div class="name_surname">
                Halil CAN
              </div>
              <div class="type">
                <i class="bi bi-circle-fill"></i>
                yazılım
              </div>
            </div>
          </li>
          <li>
            <img src="https://ui-avatars.com/api/?name=halil+can&amp;background=0288D1&amp;color=FFFFFF&amp;size=128">
            <div class="user_info">
              <div class="name_surname">
                Halil CAN
              </div>
              <div class="type">
                <i class="bi bi-circle-fill"></i>
                yazılım
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>

export default {
  name: "MentorPrograms",
  data() {
    return {
      isShowCompetencies: false,
      isShowProgramStatus: false
    }
  },
  components: {
    PageTitle: () => import('@/components/pages/shared/Title'),
    SmallCheckbox: () => import('@/components/pages/shared/elements/SmallCheckbox')
  }
}
</script>

<style scoped>
.content {
  display: flex;
  align-items: flex-start;
  background-color: white;
  padding: 15px;
  border-radius: 4px;
}

.content > .mentor_programs {
  width: 100%;
  padding: 0 20px;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
}

.content > .mentor_programs > .filters {
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

.content > .mentor_programs > .filters > div {
  position: relative;
  margin-right: 10px;
}

.content > .mentor_programs > .filters > div:hover {
  background-color: #e9e9f3;
}

.content > .mentor_programs > .filters > .selected {
  background-color: #e9e9f3;
}

.content > .mentor_programs > .filters > .selected > span > i {
  transform: rotate(180deg);
}

.content > .mentor_programs > .filters > div > span {
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

.content > .mentor_programs > .filters > div > span > i {
  margin-left: 3px;
}

.content > .mentor_programs > .filters > div > .dropdown {
  position: absolute;
  background-color: white;
  width: 100%;
  max-height: 150px;
  left: 0;
  top: 30px;
  overflow-x: auto;
  padding: 5px;
  border: 1px solid #dddddd;
  border-radius: 4px;
}

.content > .mentor_programs > .filters > div > .dropdown > div {
  padding: 6px;
  border-radius: 3px;
  cursor: pointer;
}

.content > .mentor_programs > .filters > div > .dropdown > div:hover {
  background-color: #f2f2f8;
}

.content > .mentor_programs > .filters > .create_mentor_program {
  margin-left: auto;
  background-color: var(--navy-red-bg-color);
  color: white;
  padding: 7px 10px;
  font-family: 'Poppins', sans-serif;
  font-size: 12px;
  border-radius: 3px;
  cursor: pointer;
}

.content > .mentor_programs > .filters > .create_mentor_program:hover {
  background-color: var(--navy-red-bg-dark-color);
}


.mentor_programs > ul {
  list-style: none;
  padding: 0px;
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


.content > .new_mentors {
  width: 350px;
  margin-left: 10px;
  border-radius: 3px;
  background-color: #fafafd;
  border: 1px solid #ebebf5;
}

.content > .new_mentors > .title {
  font-family: 'Poppins', sans-serif;
  font-size: 18px;
  text-align: center;
  border-radius: 3px;
  border-bottom: 1px solid #dedeec;
  background-color: #F2F2F8;
  padding: 6px 0;
}

.content > .new_mentors > ul {
  list-style: none;
  padding: 0;
  background-color: #f5f5f5;
  margin: 0;
}

.content > .new_mentors > ul > li {
  display: flex;
  justify-content: flex-start;
  padding: 13px 10px;
  border-radius: 4px;
  cursor: pointer;
  transition: .3s;
}

.content > .new_mentors > ul > li:hover {
  background-color: #efeff6;
}

.content > .new_mentors > ul > li > img {
  width: 50px;
  border-radius: var(--navy-user-profile-border-radius);
}

.content > .new_mentors > ul > li > .user_info {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: flex-start;
  margin-left: 9px;
}

.content > .new_mentors > ul > li > .user_info > .name_surname {
  font-family: 'Poppins', sans-serif;
  color: var(--navy-blue-text-color);
}

.content > .new_mentors > ul > li > .user_info > .type {
  font-family: 'Montserrat', sans-serif;
  font-size: 12px;
  display: flex;
  align-items: center;
}

.content > .new_mentors > ul > li > .user_info > .type > i {
  font-size: 5px;
  margin-right: 3px;
}
</style>