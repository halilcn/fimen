<template>
  <bg-white-template>
    <template slot="content">
      <div class="settings_container">
        <form id="userSettingsForm">
          <div class="user">
            <div class="main_info">
              <div class="image_container">
                <div class="input_container">
                  <input id="user_image" type="file">
                  <label for="user_image">
                    <i class="fas fa-pencil-alt"></i>
                  </label>
                </div>
                <img src="https://ui-avatars.com/api/?name=halil+can&amp;background=0288D0&amp;color=fff&amp;size=128">
              </div>
              <div class="username">
                @halilcan
              </div>
            </div>
            <div class="infos">
              <div>
                <input v-model.trim="$v.me.name.$model" type="text" name="name">
                <error
                    v-if="!$v.me.name.required"
                    message="Boş bırakılamaz"/>
              </div>
              <div class="readonly">
                <input type="email" :value="me.email" readonly>
              </div>
              <div class="cv">
                <div v-if="me.cv_path" class="has_cv">
                  <i class="bi bi-check-circle"></i>
                  CV yüklenmiş.
                </div>
                <div v-else class="no_cv">
                  <i class="bi bi-x-circle"></i>
                  CV yüklenmemiş.
                </div>
                <small-file-input
                    v-model="$v.me.cv.$model"
                    name="cv"
                    id="cv_file"/>
                <error
                    v-if="!$v.me.cv.checkFileSize"
                    message="Dosya en fazla 10mb olmalıdır."/>
              </div>
            </div>
            <div class="action">
              <router-link
                  tag="div"
                  :to="{name:'UserProfile',params:{username:'halil'}}"
                  class="my_profile_button">
                profile git
              </router-link>
            </div>
          </div>
          <part title="Kısacık Ön Yazı">
            <template slot="content">
              <small-textarea v-model="me.about"/>
            </template>
          </part>
          <part title="Sosyal Medya Hesapları">
            <template slot="content">
              <ul class="social_media">
                <li v-for="(url,index) in me.social_media" :key="index">
                  <small-input
                      type="text"
                      v-model="me.social_media[index]"/>
                  <div class="delete_button"> burda kaldın
                    <i class="bi bi-trash"></i>
                  </div>
                </li>
              </ul>
              <div class="add_social_media_button">
                <i class="bi bi-plus-circle-fill"></i>
                ekle
              </div>
            </template>
          </part>
        </form>
      </div>
    </template>
  </bg-white-template>
</template>

<script>
import {required} from 'vuelidate/lib/validators'
import Error from "@/components/shared/Error";
import {customValidators} from "@/helpers/customValidators";


const checkFileSize = (file) => {
  if (file.size > 0) {
    return customValidators.checkFileSize(file.size, 10);
  }
  return true;
}

export default {
  name: "MeSettings",
  data() {
    return {
      me: {},
      meDefault: {
        cv: '',
        image: ''
      }
    }
  },
  components: {
    Error,
    BgWhiteTemplate: () => import('@/components/pages/shared/BgWhiteTemplate'),
    Part: () => import('@/components/pages/user/shared/Part'),
    SmallTextarea: () => import('@/components/pages/shared/elements/SmallTextarea'),
    SmallInput: () => import('@/components/pages/shared/elements/SmallInput'),
    SmallFileInput: () => import('@/components/pages/shared/elements/SmallFileInput'),
  },
  beforeCreate() {
    this.$store.dispatch('getMeSettings')
        .then(res => {
          this.me = {...res, ...this.meDefault};
        });
  },
  methods: {},
  validations: {
    me: {
      name: {
        required
      },
      cv: {
        checkFileSize
      }
    }
  }
}
</script>

<style scoped>
.settings_container {
  padding: 5px 40px;
}

.user {
  display: flex;
  justify-content: flex-start;
}


.user > .infos {
  display: flex;
  flex-direction: column;
  margin-left: 40px;
}

.infos > div {
  margin: 4px 0;
}

.infos > div.readonly > input {
  background-color: #efefef;
  border-color: #efefef !important;
  opacity: .9;
  cursor: default;
}

.infos > div > input {
  padding: 7px 10px;
  border: 1px solid #d7d7d7;
  border-radius: 3px;
  transition: .3s;
  font-family: 'Poppins', sans-serif;
  font-weight: 400;
  color: var(--navy-blue-text-light-color);
}

.infos > div > input:focus {
  border-color: #bebebe;
}

.infos > .cv {
  font-family: 'Rubik', 'sans-serif';
  font-size: 13px;
}

.infos > .cv > div {
  margin-top: 8px;
}

.infos > .cv > .no_cv {
  color: #b71212;
}

.infos > .cv > .has_cv {
  color: #10bf74;
}

.user > .action {
  margin-left: auto;
  align-self: flex-start;
}

.user > .action > .my_profile_button {
  padding: 6px 15px;
  cursor: pointer;
  background-color: #ededed;
  color: var(--navy-blue-text-color);
  border-radius: 4px;
  font-family: 'Montserrat', sans-serif;
  font-size: 14px;
}

.user > .action > .my_profile_button:hover {
  background-color: #e3e3e3;
}

.user > .main_info {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.main_info > .image_container {

}

.main_info > .image_container > .input_container {
  position: relative;
}

.main_info > .image_container > .input_container > input {
  display: none;
}

.main_info > .image_container > .input_container > label {
  position: absolute;
  cursor: pointer;
  right: -20px;
  padding: 5px 4px 4px 6px;
  border-radius: 100%;
  color: var(--navy-blue-text-color);
}

.main_info > .image_container > .input_container > label:hover {
  background-color: #eaeaea;
}

.main_info > .image_container > img {
  border-radius: var(--navy-user-profile-border-radius);
  width: 120px;
}

.main_info > .username {
  font-family: 'Poppins', sans-serif;
  color: var(--navy-blue-text-color);
}

.social_media {
  padding: 0;
  list-style-type: none;
}

.social_media > li {
  margin: 10px 0;
  display: flex;
  align-items: center;
}

.social_media > li > .delete_button {
  padding: 6px 8px;
  border-radius: 100%;
  color: #d72222;
  margin-left: 15px;
  cursor: pointer;
}

.social_media > li > .delete_button:hover {
  background-color: #ffe8e8;
}

.add_social_media_button {
  background-color: #ffeae8;
  display: inline-block;
  color: var(--navy-red-bg-dark-color);
  cursor: pointer;
  border-radius: 10px;
  font-family: 'Montserrat', sans-serif;
  font-size: 14px;
  padding: 5px 10px;
}

.add_social_media_button:hover {
  background-color: #ffe2e0;
}
</style>