<template>
  <bg-white-template>
    <template slot="content">
      <div class="user_container">
        <div class="user">
          <div class="image">
            <img :src="user.image">
          </div>
          <div class="infos">
            <div class="name_surname">
              {{ user.name | firstLetterUppercase }}
            </div>
            <div class="username">
              @{{ user.username }}
            </div>
            <div class="role">
              Mentee {{ user.mentor ? '& Mentor' : '' }}
            </div>
            <a
                :class="{
              'not_visible':!user.permissions.cv_visible,
              'not_added':user.cv_path ==='NULL'
               }"
                target="_blank"
                :href="user.cv_path"
                class="cv">
              <template v-if="user.permissions.cv_visible && user.cv_path!=='NULL'">
                CV İncele
              </template>
              <template v-else-if="!user.permissions.cv_visible">
                CV Gizlenmiş
              </template>
              <template v-if="user.cv_path === 'NULL'">
                CV eklenmemiş
              </template>
            </a>
            sıkıntı
          </div>
          <div class="right_action">
            <div
                v-if="checkMe()"
                @click="$router.push({name:'MeSettings'})"
                class="me_settings_button">
              <i class="fas fa-cog"></i>
              <span>
                Profili Düzenle
              </span>
            </div>
            <div
                v-else
                @click="actionFavoriteUser"
                :class="{selected:user.is_favorite_user}"
                class="add_favorite_button">
              <i
                  :class="{'bi-star-fill':favorite,'bi-star':!favorite}"
                  class="bi"></i>
            </div>
          </div>
        </div>
        <div
            v-if="user.mentor"
            class="mentor">
          <div class="title">
            Mentorluk Bilgileri
          </div>
          <ul class="mentor_infos">
            <li>
              <div class="title">
                <i class="bi bi-archive-fill"></i>
                <span> bugüne kadar mentee sayısı</span>
              </div>
              <div class="text">
                {{ user.mentor.total_mentee_count }}
              </div>
            </li>
            <li>
              <div class="title">
                <i class="bi bi-archive-fill"></i>
                <span>bugüne kadar toplam program sayısı</span>
              </div>
              <div class="text">
                {{ user.mentor.total_program_count }}
              </div>
            </li>
            <li>
              <div class="title">
                <i class="bi bi-archive-fill"></i>
                <span>mentorluk alanı</span>
              </div>
              <div class="text">
                {{ user.mentor.competency }}
              </div>
            </li>
          </ul>
        </div>
        <part title="Sosyal Medya Hesapları">
          <template slot="content">
            <ul class="social_media_accounts">
              <li v-for="(url,index) in denemeSocial" :key="index">
                <a :href="url">
                  <img :src="$helper.getSocialMediaLogo(url)">
                  <span>
                    {{ url }}
                  </span>
                </a>
              </li>
            </ul>
          </template>
        </part>
        <part title="Kısacık Ön Yazı">
          <template slot="content">
            <div :class="{empty:!user.about }" class="about">
              {{ user.about ? user.about : 'Henüz eklememiş' }}
            </div>
          </template>
        </part>
      </div>
    </template>
  </bg-white-template>
</template>

<script>
export default {
  name: "UserProfile",
  data() {
    return {
      favorite: false,
      user: [],
      denemeSocial: ['facebook.com', 'instagram.com', 'https://www.linkedin.com/feed/']
    }
  },
  components: {
    BgWhiteTemplate: () => import('@/components/pages/shared/BgWhiteTemplate'),
    Part: () => import('@/components/pages/user/shared/Part')
  },
  methods: {
    checkMe() {
      return this.user.username === this.$store.state.auth.user.username;
    },
    actionFavoriteUser() {
      const payload = {user_id: this.user.id};
      if (this.user.is_favorite_user) {
        this.$store.dispatch('deleteFavoriteUser', payload);
      } else {
        this.$store.dispatch('postFavoriteUser', payload);
      }
      this.user.is_favorite_user = !this.user.is_favorite_user;
    }
  },
  beforeCreate() {
    this.$store.dispatch('getUser')
        .then(res => {
          console.log(res);
          this.user = res.data.data;
        })
        .catch(() => {
          alert('Bir hata oluştu!');
        })
  },
  filters: {}
}
</script>

<style scoped>
.user_container {
  padding: 5px 40px;
  position: relative;
}

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
  text-decoration: none;
}

.user > .infos > .cv:hover {
  background-color: #ff867f;
}

.user > .infos > .cv.not_visible {
  pointer-events: none;
  background-color: rgba(255, 115, 105, 0.7);
  color: rgba(255, 255, 255, 0.8);
}

.user > .infos > .cv.not_added {
  pointer-events: none;
  background-color: #d9d9d9;
  color: black;
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

  -webkit-box-shadow: 0px 0px 9px 0px rgba(255, 217, 216, 1);
  -moz-box-shadow: 0px 0px 9px 0px rgba(255, 217, 216, 1);
  box-shadow: 0px 0px 9px 0px rgba(255, 217, 216, 1);
}

.mentor > .title {
  font-family: 'Poppins', sans-serif;
  font-weight: 500;
  color: var(--navy-red-txt-color);
  font-size: 18px;
}

.mentor > .mentor_infos {
  padding: 0;
  list-style-type: none;
  display: flex;
  justify-content: space-around;
}

.mentor_infos > li {
  display: flex;
  flex-direction: column;
  align-items: center;
  background-color: #fff7f7;;
  padding: 7px 15px;
  border-radius: 4px;
}

.mentor_infos > li > .title {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.mentor_infos > li > .title > i {
  font-size: 40px;
  color: var(--navy-red-txt-color);
}

.mentor_infos > li > .title > span {
  font-family: 'Montserrat', sans-serif;
  font-size: 15px;
}

.mentor_infos > li > .text {
  font-family: 'Montserrat', 'sans-serif';
  font-size: 16px;
  padding: 4px 15px;
  border-radius: 4px;
  margin-top: 7px;
  background-color: red;
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

.about.empty {
  color: var(--navy-light-black);
  font-size: 13px;
}

@media only screen and (max-width: 768px) {
  .user_container {
    padding: 0;
  }

  .user {
    flex-direction: column;
    align-items: center;
    margin-top: 0;
  }

  .user > .image > img {
    width: 80px;
  }

  .user > .infos {
    flex-direction: column;
    margin-left: 0;
    align-items: center;
  }

  .user > .infos > .name_surname {
    font-size: 18px;
  }

  .user > .infos > .username {
    font-size: 15px;
  }

  .user > .infos > .role {
    margin-top: 10px;
    font-size: 13px;
  }

  .user > .infos > .cv {
    width: 100%;
    margin-top: 10px;
  }

  .user > .right_action > .add_favorite_button {
    position: absolute;
    top: 10px;
    right: 10px;
    padding: 6px 8px;
  }

  /*hahatagahatahataahata*/
  .user > .right_action > .add_favorite_button:hover {
  }

  .user > .right_action > .me_settings_button {
    padding: 5px 7px;
    font-size: 11px;
    position: absolute;
    top: 10px;
    right: 10px;
  }

  .user > .right_action > .me_settings_button > span {
    display: none;
  }

  .social_media_accounts > li > a > span {
    font-size: 13px;
  }

  .about {
    font-size: 13px;
  }
}
</style>