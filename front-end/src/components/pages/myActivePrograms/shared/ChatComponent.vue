<template>
  <div class="message">
    <popup title="Dosya Seç">
      <template slot="popup">
        <div class="message_media_popup_content">
          <standart-file-input
              :multiple="true"
              id="message_media"
              name="media_files[]"
              v-model="mediaMessageTransfer"/>
        </div>
      </template>
    </popup>
    <ul class="message_actions_list">
      <li class="item setting">
        <ul @focusin="settingDropdownAction" v-if="isShowSettingDropdown" class="setting_dropdown">
          <li class="delete_messages_btn">
            <i class="fas fa-trash-alt"></i>
            Mesajları Sil
          </li>
        </ul>
        <div @click="settingDropdownAction" class="item_btn setting_btn">
          <i class="fas fa-ellipsis-h"></i>
        </div>
      </li>
    </ul>
    <ul class="message_list">
      <li class="date">
        12 Haziran
      </li>
      <li class="item friend_message">
        <img src="https://ui-avatars.com/api/?name=halil+can&background=0288D0&color=fff&size=128">
        <div class="message_txt">
          selmal asdad sadslalsdlas das
          <div class="date_hours">
            12:32
          </div>
        </div>
      </li>
      <li class="item friend_message">
        <img src="https://ui-avatars.com/api/?name=halil+can&background=0288D0&color=fff&size=128">
        <div class="message_txt">
          selmal asdad sadslalsdlas das
          <div class="date_hours">
            12:32
          </div>
        </div>
      </li>
      <li class="item friend_message">
        <img src="https://ui-avatars.com/api/?name=halil+can&background=0288D0&color=fff&size=128">
        <div class="message_txt">
          selmal asdad sadslalsdlas das selmal asdad sadslalsdlas das selmal asdad sadslalsdlas das selmal asdad
          sadslalsdlas das selmal asdad sadslalsdlas das selmal asdad sadslalsdlas das selmal asdad sadslalsdlas das
        </div>
      </li>
      <li class="item friend_message">
        <img src="https://ui-avatars.com/api/?name=halil+can&background=0288D0&color=fff&size=128">
        <div class="message_txt">
          selmal asdad sadslalsdlas das selmal asdad sadslalsdlas das selmal asdad sadslalsdlas das selmal asdad
          sadslalsdlas das selmal asdad sadslalsdlas das selmal asdad sadslalsdlas das selmal asdad sadslalsdlas das
        </div>
      </li>
      <li class="item friend_message">
        <img src="https://ui-avatars.com/api/?name=halil+can&background=0288D0&color=fff&size=128">
        <div class="message_txt">
          selmal asdad sadslalsdlas das selmal asdad sadslalsdlas das selmal asdad sadslalsdlas das selmal asdad
          sadslalsdlas das selmal asdad sadslalsdlas das selmal asdad sadslalsdlas das selmal asdad sadslalsdlas das
        </div>
      </li>
      <li class="date">
        16 Haziran
      </li>
      <li class="item my_message">
        <div class="message_txt">
          bu benim mesajım dır asdıjaısd jıasda
        </div>
      </li>
      <li class="item my_message">
        <div class="message_txt">
          bu benim mesajım dır asdıjaısd jıasda
        </div>
      </li>
      <li class="item my_message">
        <div class="message_txt">
          bu benim mesajım dır asdıjaısd jıasda
        </div>
      </li>
      <li class="item my_message">
        <div class="message_txt">
          bu benim mesajım dır asdıjaısd jıasda
        </div>
      </li>
      <li class="item my_message">
        <div class="message_txt">
          bu benim mesajım dır asdıjaısd jıasdabu benim mesajım dır asdıjaısd jıasdabu benim mesajım dır asdıjaısd
          jıasdabu benim mesajım dır asdıjaısd jıasdabu benim mesajım dır asdıjaısd jıasdabu benim mesajım dır asdıjaısd
          jıasda
        </div>
      </li>
      <li class="item my_message">
        <div class="message_txt">
          bu benim mesajım dır asdıjaısd jıasdabu benim mesajım dır asdıjaısd jıasdabu benim mesajım dır asdıjaısd
          jıasdabu benim mesajım dır asdıjaısd jıasdabu benim mesajım dır asdıjaısd jıasdabu benim mesajım dır asdıjaısd
          jıasda
        </div>
      </li>
      <li class="item friend_message">
        <img src="https://ui-avatars.com/api/?name=halil+can&background=0288D0&color=fff&size=128">
        <div class="message_txt">
          selmal asdad sadslalsdlas das selmal asdad sadslalsdlas das selmal asdad sadslalsdlas das selmal asdad
          sadslalsdlas das selmal asdad sadslalsdlas das selmal asdad sadslalsdlas das selmal asdad sadslalsdlas das
        </div>
      </li>
      <li class="item friend_message">
        <img src="https://ui-avatars.com/api/?name=halil+can&background=0288D0&color=fff&size=128">
        <div class="message_txt">
          selmal asdad sadslalsdlas das selmal asdad sadslalsdlas das selmal asdad sadslalsdlas das selmal asdad
          sadslalsdlas das selmal asdad sadslalsdlas das selmal asdad sadslalsdlas das selmal asdad sadslalsdlas das
        </div>
      </li>
    </ul>

    {{ message }}
    ---{{ mediaList }}
    <div class="send_message_container">
      <small-textarea v-if="!mediaList" v-model="message.content"/>
      <div v-else class="media_list">
        <div
            v-for="(media,index) in mediaList"
            :key="index"
            class="item">
          <div @click="deleteMessageMedia(index)" class="delete_media">
            <i class="far fa-trash-alt"></i>
          </div>
          <div class="content">
            {{ media.count }} {{ index }}
          </div>
        </div>
        <div @click="$store.commit('setShowPopup',true)" class="add_media">
          <i class="fas fa-plus-circle"></i>
          ekle
        </div>
      </div>
      <div class="message_actions">
        <div v-if="isMessageEmpty" class="media">
          <div @click="isShowMediaDropdown=!isShowMediaDropdown" class="media_btn">
            <i class="fas fa-paperclip"></i>
          </div>
          <ul v-if="isShowMediaDropdown" class="media_dropdown">
            <li @click="$store.commit('setShowPopup',true)">
              <i class="fas fa-photo-video"></i>
            </li>
          </ul>
        </div>
        <div
            v-else
            @click="postMessage"
            class="send_message">
          <i class="bi bi-caret-right-fill"></i>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "ChatComponent",
  data() {
    return {
      isShowSettingDropdown: false,
      isShowMediaDropdown: false,
      mediaMessageTransfer: [],
      message: {
        type: 'message',
        content: '',
      }
    }
  },
  components: {
    Popup: () => import('@/components/pages/shared/Popup'),
    StandartFileInput: () => import('@/components/pages/shared/elements/StandartFileInput'),
    SmallTextarea: () => import('@/components/pages/shared/elements/SmallTextarea')
  },
  methods: {
    settingDropdownAction() {
      this.isShowSettingDropdown = !this.isShowSettingDropdown;
    },
    postMessage() {
      this.$store.dispatch('postMentorMenteeProgramMessage', this.message);
    },
    disableMediaPopup() {
      this.$store.commit('setShowPopup', false);
    },
    deleteMessageMedia(type) {
      for (let key in this.message.content) {
        if (this.message.content[key].type === type) {
          this.message.content.splice(0, key);
        }
      }
    }
  },
  computed: {
    isMessageEmpty() {
      return this.message.content === '';
    },
    mediaList() {
      if (this.message.type !== 'media') {
        return false;
      }

      const result = {};

      const mediaMessageContent = this.message.content;
      Object.keys(mediaMessageContent).forEach((index) => {
        if (!result[mediaMessageContent[index].type]) {
          result[mediaMessageContent[index].type] = {
            'count': 1,
          };
          return 0;
        }
        result[mediaMessageContent[index].type].count += 1;
      });

      return result;
    },
  },
  watch: {
    mediaMessageTransfer(newVal) {
      this.disableMediaPopup();
      this.message.content = [...newVal, ...this.message.content];
    },
    'message.content': function (newVal) {
      //If Type Media
      if (typeof newVal == 'object') {
        this.message.type = 'media';
        return 0;
      }

      this.message.type = 'message';
    }
  }
}
</script>

<style scoped>
.message {
  display: flex;
  flex-direction: column;
}

.message > .message_actions_list {
  padding: 0;
  margin: 0;
  list-style-type: none;
  align-self: flex-end;
}

.message > .message_actions_list > .item {
  position: relative;
}

.message > .message_actions_list > .item > .item_btn {
  padding: 4px 10px;
  border-radius: 4px;
  background-color: #f2f2f2;
  color: var(--navy-blue-text-color);
  cursor: pointer;
}

.message > .message_actions_list > .item > .item_btn:hover {
  background-color: #eaeaea;
}

.message > .message_actions_list > .item.setting {
  display: flex;
  justify-content: center;
}

.message > .message_actions_list > .item > .setting_dropdown {
  position: absolute;
  bottom: 30px;
  list-style-type: none;
  padding: 0;
  width: 100px;
  background-color: white;
  margin: 0;

  box-shadow: 0 0px 0.3px rgba(0, 0, 0, 0.014),
  0 0px 0.7px rgba(0, 0, 0, 0.02),
  0 0px 1.3px rgba(0, 0, 0, 0.025),
  0 0px 2.2px rgba(0, 0, 0, 0.03),
  0 0px 4.2px rgba(0, 0, 0, 0.036),
  0 0px 10px rgba(0, 0, 0, 0.05);
}

.message > .message_actions_list > .item > .setting_dropdown > li {
  font-family: 'Poppins', sans-serif;
  font-size: 12px;
  padding: 5px 8px;
  cursor: pointer;
  overflow: hidden;
}

.message > .message_actions_list > .item > .setting_dropdown > li.delete_messages_btn {
  background-color: #fff1f1;
  color: #dd2020;
}

.message_list {
  position: relative;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  list-style-type: none;
  background-color: white;
  padding: 13px;
  border-radius: 4px;
  overflow-y: auto;
  max-height: 500px;
  box-shadow: 0 0px 0.7px rgba(0, 0, 0, 0.011),
  0 0px 1.6px rgba(0, 0, 0, 0.016),
  0 0px 3px rgba(0, 0, 0, 0.02),
  0 0px 5.4px rgba(0, 0, 0, 0.024),
  0 0px 10px rgba(0, 0, 0, 0.029),
  0 0px 24px rgba(0, 0, 0, 0.04);
}

.message_list::-webkit-scrollbar {
  width: 6px;
}

.message_list::-webkit-scrollbar-thumb {
  background: #d7d7d7;
  border-radius: 5px;
}

.message_list > .date {
  align-self: center;
  font-family: 'Poppins', sans-serif;
  font-weight: 300;
  background-color: var(--navy-red-bg-dark-color);
  color: white;
  position: sticky;
  top: 0;
  margin: 10px 0;
  z-index: 2;
  padding: 3px 10px;
  font-size: 11px;
  border-radius: 5px;
}

.message_list > .item {
  width: 48%;
  margin: 3px 0;
}

.message_list > .item > .message_txt {
  position: relative;
  padding: 7px 14px 14px 10px;
  background-color: #ececec;
  font-family: 'Poppins', sans-serif;
  font-size: 13px;
  border-radius: 4px;
}

.message_list > .item > .message_txt > .date_hours {
  position: absolute;
  font-size: 11px;
  right: 2px;
  bottom: 2px;
}

.message_list > .item.friend_message {
  display: flex;
  align-items: center;
}

.message_list > .item.friend_message img {
  width: 30px;
  height: 30px;
  border-radius: var(--navy-user-profile-border-radius);
}

.message_list > .item.friend_message > .message_txt {
  margin-left: 5px;
}

.message_list > .item.my_message {
  align-self: flex-end;
}

.message_list > .item.my_message > .message_txt {
  background-color: #ecf6ff;
}

.send_message_container {
  display: flex;
  align-items: center;
  padding: 13px;
  border-radius: 4px;
  box-shadow: 0 0px 0.7px rgba(0, 0, 0, 0.011),
  0 0px 1.6px rgba(0, 0, 0, 0.016),
  0 0px 3px rgba(0, 0, 0, 0.02),
  0 0px 5.4px rgba(0, 0, 0, 0.024),
  0 0px 10px rgba(0, 0, 0, 0.029),
  0 0px 24px rgba(0, 0, 0, 0.04);
}

.send_message_container > textarea {
  resize: none;
  overflow: hidden;
  height: 35px;
  border-radius: 15px;
  min-height: 35px;
  max-height: 150px;
}

.send_message_container > .media_list {
  width: 100%;
  display: flex;
}

.send_message_container > .media_list > div {
  margin: 0 5px;
  font-family: 'Poppins', sans-serif;
  font-size: 12px;
}

.send_message_container > .media_list > .item {
  display: flex;
  align-items: center;
}

.send_message_container > .media_list > .item > .content {
  background-color: #f3f3f3;
  padding: 2px 7px;
  border-radius: 4px;
}

.send_message_container > .media_list > .item > .delete_media {
  margin-right: 2px;
  color: var(--navy-red-text-color);
  background-color: #ffeded;
  padding: 2px 7px;
  border-radius: 4px;
  cursor: pointer;
}

.send_message_container > .media_list > .add_media {
  padding: 2px 7px;
  border-radius: 4px;
  cursor: pointer;
  background-color: #fff1f1;
  color: var(--navy-red-txt-color);
}

.send_message_container > .media_list > .add_media:hover {
  background-color: #ffebeb;
}

.send_message_container > .message_actions {
  margin-left: 20px;
  width: 70px;
}

.send_message_container > .message_actions > .media {
  display: flex;
  justify-content: center;
  position: relative;
}

.send_message_container > .message_actions > .media > .media_btn {
  padding: 6px;
  border-radius: 5px;
  cursor: pointer;
  color: var(--navy-blue-text-color);
}

.send_message_container > .message_actions > .media > .media_dropdown {
  display: flex;
  justify-content: space-between;
  list-style-type: none;
  margin: 0;
  position: absolute;
  bottom: 40px;
  padding: 10px;
  border-radius: 4px;
  font-size: 20px;
  background-color: white;
  box-shadow: 0 0px 0.5px rgba(0, 0, 0, 0.008),
  0 0px 1.1px rgba(0, 0, 0, 0.012),
  0 0px 2.1px rgba(0, 0, 0, 0.015),
  0 0px 3.8px rgba(0, 0, 0, 0.018),
  0 0px 7.1px rgba(0, 0, 0, 0.022),
  0 0px 17px rgba(0, 0, 0, 0.03);
}

.send_message_container > .message_actions > .media > .media_dropdown > li {
  padding: 12px 15px 12px 12px;
  border: 1px solid #f5f5f5;
  border-radius: 4px;
  cursor: pointer;
}

.send_message_container > .message_actions > .media > .media_dropdown > li:hover {
  background-color: #f5f5f5;
}

.send_message_container > .message_actions > .send_message {
  width: 50px;
  background-color: #f2f4f6;
  border-radius: 40%;
  font-size: 25px;
  cursor: pointer;
  color: var(--navy-blue-text-color);
  padding: 4px 10px;
  text-align: center;
}

.send_message_container > .message_actions > .send_message:hover {
  background-color: #e6eaee;
}

.message_media_popup_content {
  margin-top: 10px;
}
</style>