<template>
  <bg-white-template>
    <template slot="content">
      <div class="settings_container">
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
              <input type="text" value="Halil CAN">
            </div>
            <div>
              <input type="text" value="email">
            </div>
            <div class="cv">
              <div class="no_cv">
                <i class="bi bi-x-circle"></i>
                CV yüklenmemiş.
              </div>
              <div class="has_cv">
                <i class="bi bi-check-circle"></i>
                CV yüklenmiş.
              </div>
              <small-file-input id="12"/>
            </div>
          </div>
          <div class="action">
            <div>
              profile git
            </div>
          </div>
        </div>
        <part title="Kısacık Ön Yazı">
          <template slot="content">
            <small-textarea/>
          </template>
        </part>
        <part title="Sosyal Medya Hesapları">
          <template slot="content">
            <ul class="social_media">
              <li v-for="index in 3" :key="index">
                <small-input/>
                <div class="delete_button">
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
      </div>
    </template>
  </bg-white-template>
</template>

<script>

export default {
  name: "MeSettings",
  components: {
    BgWhiteTemplate: () => import('@/components/pages/shared/BgWhiteTemplate'),
    Part: () => import('@/components/pages/user/shared/Part'),
    SmallTextarea: () => import('@/components/pages/shared/elements/SmallTextarea'),
    SmallInput: () => import('@/components/pages/shared/elements/SmallInput'),
    SmallFileInput: () => import('@/components/pages/shared/elements/SmallFileInput'),
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
  margin: 2px 0;
}

.infos > div > input {
  padding: 5px 10px;
  border: 1px solid #b3b3b3;
  border-radius: 3px;
}

.infos > .cv {

}

.infos > .cv > .no_cv {
  color: #b71212;
  font-family: 'Rubik', 'sans-serif';
  font-size: 13px;
}

.infos > .cv > .has_cv {
  color: #10bf74;
  font-family: 'Rubik', 'sans-serif';
  font-size: 13px;

}

.user > .action {
  background-color: red;
  margin-left: auto;
  align-self: flex-start;
  padding: 6px 15px;
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