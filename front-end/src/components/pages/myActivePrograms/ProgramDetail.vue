<template>
  <bg-white-template>
    <template slot="content">
      <div class="top_info">
        <div class="mentee">
          <div class="user">
            <div class="title">
              Mentee
            </div>
            <img src="https://ui-avatars.com/api/?name=Halil+Can&amp;background=f2f2f2&amp;size=128">
            <div class="name">Halil Can</div>
            <router-link
                tag="div"
                :to="{name:'UserProfile',params:{username:'deneme'}}"
                class="username">@hcan
            </router-link>
          </div>
        </div>
        <div class="next_meeting">
          <div class="text">
            <i class="far fa-clock"></i>
            Bir sonraki toplanma tarihi
          </div>
          <div class="date">
            <div class="day">12</div>
            <div class="month">Haziran</div>
            <div class="hour">12:00</div>
          </div>
          <div class="new_meeting">
            <i class="fas fa-user-friends"></i>
            Yeni Toplantı
          </div>
        </div>
        <div class="mentor">
          <div class="user">
            <div class="title mentor">
              Mentor
            </div>
            <img src="https://ui-avatars.com/api/?name=Halil+Can&amp;background=f2f2f2&amp;size=128">
            <div class="name">Mehmet Can</div>
            <router-link
                tag="div"
                :to="{name:'UserProfile',params:{username:'deneme'}}"
                class="username">
              @mehmet
            </router-link>
          </div>
        </div>
      </div>
      <div class="links">
        <div class="item active">
          Ana Sayfa
        </div>
        <div class="item">
          Takvim
        </div>
        <div class="item">
          Mesajlaşma
        </div>
        <div class="item">
          Diğer
        </div>
      </div>
      <component
          :is="activeComponent"
          class="dynamic_content">
        asdads
      </component>
    </template>
  </bg-white-template>
</template>

<script>
export default {
  name: "ProgramDetail",
  data() {
    return {
      activeComponent: 'MainComponent'
    }
  },
  components: {
    BgWhiteTemplate: () => import('@/components/pages/shared/BgWhiteTemplate'),
    MainComponent: () => import('@/components/pages/myActivePrograms/shared/MainComponent'),
  },
}
</script>

<style scoped>
.top_info {
  display: flex;
  justify-content: flex-start;
  padding: 10px;
  border-radius: 5px;
  box-shadow: 0 0px 0.6px rgba(0, 0, 0, 0.011),
  0 0px 1.5px rgba(0, 0, 0, 0.016),
  0 0px 2.8px rgba(0, 0, 0, 0.02),
  0 0px 4.9px rgba(0, 0, 0, 0.024),
  0 0px 9.2px rgba(0, 0, 0, 0.029),
  0 0px 22px rgba(0, 0, 0, 0.04);

}

.top_info .user {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.top_info .user > .title {
  font-family: 'Rubik', sans-serif;
  font-size: 22px;
  margin-bottom: 15px;
  color: var(--navy-blue-text-color);
}

.top_info .user > .title.mentor {
  color: var(--navy-mentor-mentee-text-color);
}

.top_info .user > img {
  width: 80px;
  border-radius: var(--navy-user-profile-border-radius);
}

.top_info .user > .name {
  font-family: 'Rubik', sans-serif;
  font-size: 19px;
  font-weight: 300;
  margin: 5px 0;
}

.top_info .user > .username {
  font-family: 'Rubik', sans-serif;
  font-size: 15px;
  cursor: pointer;
  color: black;
}

.top_info .user > .username:hover {
  color: #646464;
}

.top_info > .mentee {
  width: 50%;
}

.top_info > .next_meeting {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  width: 100%;
}

.top_info > .next_meeting > .text {
  font-family: 'Rubik', sans-serif;
  font-weight: 300;
  font-size: 14px;
  font-style: italic;
}

.top_info > .next_meeting > .date {
  display: flex;
  flex-direction: column;
  align-items: center;
  background-color: #f6f6f6;
  border: 1px solid #eeeeee;
  font-family: 'Rubik', sans-serif;
  padding: 10px;
  border-radius: 5px;
  margin-top: 10px;
  color: var(--navy-blue-text-color);
}

.top_info > .next_meeting > .date > .day {
  font-size: 25px;
}

.top_info > .next_meeting > .date > .month {
  font-size: 15px;
}

.top_info > .next_meeting > .new_meeting {
  margin-top: 15px;
  font-family: 'Rubik', sans-serif;
  padding: 6px 15px;
  border-radius: 5px;
  font-size: 14px;
  cursor: pointer;
  background-color: #2cae2c;
  color: white;
}

.top_info > .mentor {
  width: 50%;
}

.links {
  display: flex;
  margin-top: 30px;
  border-bottom: 1px solid #e3e3e3;
  padding-bottom: 7px;
}

.links > .item {
  padding: 6px 16px;
  margin-right: 10px;
  cursor: pointer;
  border-radius: 5px;
  font-family: 'Rubik', sans-serif;
  font-size: 14px;
  font-weight: 400;
  color: var(--navy-blue-text-color);
}

.links > .item:hover {
  background-color: #f8f8f8;
}

.links > .item.active {
  background-color: #f1f1f1;
}

.dynamic_content {
  margin-top: 20px;
  padding: 13px;
}
</style>