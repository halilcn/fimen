<template>
  <div class="message">
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
    </ul>
    <div class="send_message_container">
      messaje send container
    </div>
  </div>
</template>

<script>
export default {
  name: "ChatComponent",
  data() {
    return {
      isShowSettingDropdown: false
    }
  },
  methods: {
    settingDropdownAction() {
      this.isShowSettingDropdown = !this.isShowSettingDropdown;
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
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  list-style-type: none;
  background-color: white;
  padding: 13px;
  border-radius: 4px;
  box-shadow: 0 0px 0.7px rgba(0, 0, 0, 0.011),
  0 0px 1.6px rgba(0, 0, 0, 0.016),
  0 0px 3px rgba(0, 0, 0, 0.02),
  0 0px 5.4px rgba(0, 0, 0, 0.024),
  0 0px 10px rgba(0, 0, 0, 0.029),
  0 0px 24px rgba(0, 0, 0, 0.04);
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
</style>