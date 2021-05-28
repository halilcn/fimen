<template>
  <bg-white-template>
    <template slot="content">
      <div class="settings_container">
        <form id="userSettingsForm">
          <div class="user">
            <div class="main_info">
              <error
                  v-if="!$v.me.image_file.fileSize"
                  :message="$errors.maxFileSize(_,2)"/>
              <div class="image_container">
                <div class="input_container">
                  <small-file-input
                      class="file_input"
                      id="user_image"
                      v-model="$v.me.image_file.$model"/>
                  <label for="user_image">
                    <i class="fas fa-pencil-alt"></i>
                  </label>
                </div>
                <img :src="imageUrl">
              </div>
              <div class="username">
                @{{ me.username }}
              </div>
            </div>
            <div class="infos">
              <div>
                <input v-model.trim="$v.me.name.$model" type="text" name="name">
                <error
                    v-if="!$v.me.name.required"
                    :message="$errors.required()"/>
              </div>
              <div class="readonly">
                <input type="email" :value="me.email" readonly>
              </div>
              <div class="cv">
                <div v-if="me.cv_path" class="has_cv">
                  <i class="bi bi-check-circle"></i>
                  CV yüklenmiş.
                  <a
                      target="_blank"
                      class="cv_link"
                      :href="me.cv_path">
                    İncele
                  </a>
                </div>
                <div v-else class="no_cv">
                  <i class="bi bi-x-circle"></i>
                  CV yüklenmemiş.
                </div>
                <small-file-input
                    v-model="$v.me.cv_file.$model"
                    name="cv"
                    id="cv_file"/>
                <error
                    v-if="!$v.me.cv_file.fileSize"
                    :message="$errors.maxFileSize(_,10)"/>
                <error
                    v-if="!$v.me.cv_file.fileType"
                    message="Dosya sadece .pdf uzantılı olabilir."/>
              </div>
            </div>
            <div class="action">
              <router-link
                  tag="div"
                  :to="{name:'UserProfile',params:{username:me.username}}"
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
                      v-model="$v.me.social_media.$model[index]"/>
                  <div @click="deleteSocialMedia(index)" class="delete_button">
                    <i class="bi bi-trash"></i>
                  </div>
                </li>
              </ul>
              <div @click="addSocialMedia" class="add_social_media_button">
                <i class="bi bi-plus-circle-fill"></i>
                ekle
              </div>
              <error
                  v-if="$v.me.social_media.$anyError"
                  :message="$errors.required()"/>
            </template>
          </part>
          <div class="send_settings">
            <standart-button
                @click.native="postMeSettings"
                :isDisable="$v.me.$invalid"
                text="Kaydet"/>
          </div>
        </form>
      </div>
    </template>
  </bg-white-template>
</template>

<script>
import {required} from 'vuelidate/lib/validators'
import {customValidators} from "@/helpers/customValidators";

const checkCvFileSize = (file) => {
  if (file) {
    return customValidators.checkFileSize(file.size, 10);
  }
  return true;
}

const checkImageFileSize = (file) => {
  if (file) {
    return customValidators.checkFileSize(file.size, 2);
  }
  return true;
}

const fileType = (file) => {
  if (file) {
    return customValidators.checkFileType(file.type, 'application/pdf');
  }
  return true;
}

export default {
  name: "MeSettings",
  data() {
    return {
      me: {},
      meDefault: {
        cv_file: '',
        image_file: '',
      }
    }
  },
  components: {
    Error: () => import( '@/components/shared/Error'),
    BgWhiteTemplate: () => import('@/components/pages/shared/BgWhiteTemplate'),
    Part: () => import('@/components/pages/user/shared/Part'),
    SmallTextarea: () => import('@/components/pages/shared/elements/SmallTextarea'),
    SmallInput: () => import('@/components/pages/shared/elements/SmallInput'),
    SmallFileInput: () => import('@/components/pages/shared/elements/SmallFileInput'),
    StandartButton: () => import('@/components/pages/shared/elements/StandartButton'),
  },
  beforeCreate() {
    this.$store.dispatch('getMeSettings')
        .then(res => {
          this.me = {...res, ...this.meDefault};
        });
  },
  methods: {
    deleteSocialMedia(index) {
      this.me.social_media.splice(index, 1);
    },
    addSocialMedia() {
      this.me.social_media.push('');
    },
    postMeSettings() {
      this.$store.dispatch('postMeSettings', this.$helper.convertForm(this.me))
          .then((res) => {
            //?
            this.me = {...res, ...this.meDefault};
          });
    },
  },
  computed: {
    imageUrl() {
      return this.me.image_file ? URL.createObjectURL(this.me.image_file) : this.me.image;
    }
  },
  validations: {
    me: {
      name: {
        required
      },
      image_file: {
        fileSize: checkImageFileSize
      },
      cv_file: {
        fileSize: checkCvFileSize,
        fileType
      },
      //image ??
      social_media: {
        $each: {
          required
        }
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

.infos > .cv > .has_cv > .cv_link {
  text-decoration: none;
  margin-left: 4px;
  color: #585858;
}

.infos > .cv > .has_cv > .cv_link:hover {
  text-decoration: underline;
}

.user > .action {
  margin-left: auto;
  align-self: flex-start;
}

.user > .action > .my_profile_button {
  padding: 6px 15px;
  cursor: pointer;
  background-color: #ffebeb;
  color: var(--navy-red-txt-color);
  border-radius: 4px;
  font-family: 'Montserrat', sans-serif;
  font-size: 14px;
}

.user > .action > .my_profile_button:hover {
  background-color: #ffe4e4;
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

.main_info > .image_container > .input_container > .file_input {
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
  height: 120px;
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

.send_settings {
  display: flex;
  justify-content: flex-end;
  margin-top: 60px;
}
</style>