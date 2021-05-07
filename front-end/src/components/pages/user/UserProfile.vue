<template>
  <bg-white-template>
    <template slot="content">
      <div class="user_container">
        <div class="user">
          <div class="image">
            <img src="https://ui-avatars.com/api/?name=halil+can&amp;background=0288D0&amp;color=fff&amp;size=128">
          </div>
          <div class="infos">
            <div class="name_surname">
              Halil CAN
            </div>
            <div class="username">
              @halilcan
            </div>
            <div class="role">
              Mentee & Mentor
            </div>
            <div class="cv">
              CV İncele
            </div>
          </div>
          <div class="right_action">
            <!--  <div class="me_settings_button">
              <i class="fas fa-cog"></i>
              Profili Düzenle
            </div>-->
            <div
                @click="favorite=!favorite"
                :class="{selected:favorite}"
                class="add_favorite_button">
              <i
                  :class="{'bi-star-fill':favorite,'bi-star':!favorite}"
                  class="bi"></i>
            </div>
          </div>
        </div>
        <div class="mentor">
          <div class="title">
            Mentorluk Bilgileri
          </div>
          <ul>

          </ul>
        </div>
        <part title="Sosyal Medya Hesapları">
          <template slot="content">
            <ul class="social_media_accounts">
              <li>
                <a href="#">
                  <img src="../../../assets/icons/socialMedia/linkedin.svg">
                  <span>
                    https://www.facebook.com/
                  </span>
                </a>
              </li>
              <li>
                <a href="#">
                  <img src="../../../assets/icons/socialMedia/instagram.svg">
                  <span>
                    https://www.instagram.com/
                  </span>
                </a>
              </li>
            </ul>
          </template>
        </part>
        <part title="Kısacık Ön Yazı">
          <template slot="content">
            <div class="about">
              asda djasd ljasd sasdh uhasd hasd ga hdhja dah ssda djasd ljasd sasdh uhasd hasd ga hdhja dah ssda djasd
              ljasd sasdh uhasd hasd ga hdhja dah ssda djasd ljasd sasdh uhasd hasd ga hdhja dah ssda djasd ljasd sasdh
              uhasd hasd ga hdhja dah ssda djasd ljasd sasdh uhasd hasd ga hdhja dah ssda djasd ljasd sasdh uhasd hasd
              ga hdhja dah ssda djasd ljasd sasdh uhasd hasd ga hdhja dah ssda djasd ljasd sasdh uhasd hasd ga hdhja dah
              ssda djasd ljasd sasdh uhasd hasd ga hdhja dah s
            </div>
          </template>
        </part>
        mentorse?
      </div>
    </template>
  </bg-white-template>
</template>

<script>
export default {
  name: "UserProfile",
  data() {
    return {
      favorite: false
    }
  },
  components: {
    BgWhiteTemplate: () => import('@/components/pages/shared/BgWhiteTemplate'),
    Part: () => import('@/components/pages/user/shared/Part')
  }
}
</script>

<style scoped>
.user {
  display: flex;
  justify-content: flex-start;

  background-color: white;
  border-radius: 10px;
  padding: 20px;
  margin-top: 30px;
  transition: .3s;
  box-shadow: 0 0px 0.3px rgba(0, 0, 0, 0.014),
  0 0px 0.7px rgba(0, 0, 0, 0.02),
  0 0px 1.4px rgba(0, 0, 0, 0.025),
  0 0px 2.5px rgba(0, 0, 0, 0.03),
  0 0px 4.6px rgba(0, 0, 0, 0.036),
  0 0px 11px rgba(0, 0, 0, 0.05);
}

.user > .image {
}

.user > .image > img {
  border-radius: var(--navy-user-profile-border-radius);
  width: 160px;
}

.user > .infos {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  justify-content: flex-start;
  margin-left: 40px;
}

.user > .infos > .name_surname {
  font-family: 'Poppins', sans-serif;
  font-weight: 400;
  font-size: 25px;
  color: var(--navy-blue-text-color);
}

.user > .infos > .username {
  font-family: 'Montserrat', sans-serif;
  font-size: 15px;
  color: #4a4a4a;
}

.user > .infos > .role {
  font-family: 'Poppins', sans-serif;
  font-weight: 400;
  background-color: #e9f1ff;
  color: #246acf;
  padding: 5px 10px;
  margin-top: 5px;
  border-radius: 3px;
}

.user > .infos > .cv {
  background-color: var(--navy-red-bg-color);
  color: white;
  font-family: 'Poppins', sans-serif;
  font-size: 13px;
  padding: 5px 30px;
  border-radius: 3px;
  cursor: pointer;
  margin-top: auto;
  transition: .3s;
}

.user > .infos > .cv:hover {
  background-color: #ff867f;
}

.user > .right_action {
  margin-left: auto;
  align-self: flex-start;
}

.user > .right_action > .add_favorite_button {
  padding: 8px 10px;
  border: 1px solid #d2d2d2;
  color: #8f8f8f;
  background-color: #f8f8f8;
  border-radius: 5px;
  cursor: pointer;
}

.user > .right_action > .add_favorite_button.selected {
  border-color: #ffe2e0;
  background-color: #ffe2e0;
  color: var(--navy-red-bg-color);
}

.user > .right_action > .add_favorite_button:not(.selected):hover {
  border-color: #ffe2e0;
  background-color: #ffe2e0;
  color: var(--navy-red-bg-color);
}

.user > .right_action > .me_settings_button {
  background-color: #f1f1f1;
  padding: 8px 15px;
  font-family: 'Montserrat', sans-serif;
  font-size: 14px;
  border-radius: 4px;
  cursor: pointer;
  color: var(--navy-blue-text-color);
}

.user > .right_action > .me_settings_button:hover {
  background-color: #e9e9e9;
}

.mentor {
  background-color: white;
  border: 1px solid #ffd9d8;
  border-radius: 10px;
  padding: 12px;
  margin-top: 30px;
  transition: .3s;
}

.user_container {
  padding: 5px 40px;
}

.social_media_accounts {
  padding: 0;
  list-style-type: none;
}

.social_media_accounts > li {
  background-color: #fcfcfc;
  border-radius: 3px;
  display: flex;
  margin: 5px 0;
  transition: .3s;
}

.social_media_accounts > li:hover {
  background-color: #f2f2f2;
}

.social_media_accounts > li > a {
  text-decoration: none;
  width: 100%;
  padding: 8px 13px;
  display: flex;
  align-items: center;
}

.social_media_accounts > li > a > span {
  margin-left: 10px;
  color: var(--navy-blue-text-color);
  font-family: 'Montserrat', 'sans-serif';
  font-size: 15px;
}

.social_media_accounts > li > a > img {
  width: 30px;
}

.about {
  font-family: 'Montserrat', sans-serif;
  font-size: 15px;
  color: var(--navy-blue-text-color);
}


</style>