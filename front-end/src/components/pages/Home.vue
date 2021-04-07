<template>
  <div class="container">
    <div class="head_container">
      <div class="head_content">
        <div class="logo">
          <img src="@/assets/images/logos/red_233x65.png"/>
        </div>
        <div class="links">
          <router-link
              to="/"
              tag="div"
              exact-active-class="active_button">
            <i class="bi bi-house-door not_active_icon"></i>
            <i class="bi bi-house-door-fill active_icon"></i>
          </router-link>
          <router-link
              to="/bildirimler"
              tag="div"
              exact-active-class="active_button">
            <i class="bi bi-bell not_active_icon"></i>
            <i class="bi bi-bell-fill active_icon"></i>
          </router-link>
          <div>
            <i class="bi bi-bell"></i>
          </div>
          <div>
            <i class="bi bi-bell"></i>
          </div>
        </div>
        <div class="search_user">
          <label for="search_input">
            <i class="bi bi-search"></i>
          </label>
          <input id="search_input" placeholder="Kişi ara" type="text">
        </div>
        <div class="user">
          <div @click="isEnableDropdown=!isEnableDropdown" class="info">
            <img src="https://ui-avatars.com/api/?name=halil+can&background=0288D1&color=FFFFFF&size=128">
            <span class="username">
              hcan
            </span>
            <i class="bi bi-caret-down-fill"></i>
          </div>
          <div v-if="isEnableDropdown" class="dropdown">
            <div class="top">
              <div class="user_profile">
                <img src="https://ui-avatars.com/api/?name=halil+can&background=0288D1&color=FFFFFF&size=128">
                <div class="info">
                  <div class="name">
                    Halil CAN
                  </div>
                  <div class="rank">
                    <span class="mentee">
                      Mentee
                    </span>
                    <span class="mentor">
                      & Mentor
                    </span>
                  </div>
                </div>
              </div>
              <div class="mentor_apply_button">
                Mentor Başvurusu
              </div>
            </div>
            <div class="links">
              <div>
                <i class="bi bi-gear-fill"></i>
                Ayarlar
              </div>
              <div>
                <i class="bi bi-gear-fill"></i>
                Ayarlar
              </div>
              <div>
                <i class="bi bi-gear-fill"></i>
                Ayarlar
              </div>
              <div class="logout" @click="postLogout">
                <i class="bi bi-door-open-fill"></i>
                Çıkış
              </div>
            </div>
            <div class="footer">
              <div>
                <i class="bi bi-dot"></i>
                hakkımızda
              </div>
              <div>
                <i class="bi bi-dot"></i>
                koşullar
              </div>
              <div>
                <i class="bi bi-dot"></i>
                yardım & destek
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="main_container">
      <div class="main_content">
        <router-view></router-view>
        asdsa
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
      </div>
    </div>
    <!-- home pageasdkdasd
    {{ $store.state.auth.user }}--
    <router-view></router-view>
    <div
        @click="postLogout">
      Çıkış
    </div>-->
  </div>
</template>

<script>
export default {
  name: "Home",
  data() {
    return {
      isEnableDropdown: false
    }
  },
  methods: {
    postLogout() {
      this.$store.dispatch('postLogout')
          .then(() => {
            this.$router.push('/giris');
          });
    }
  },
  created() {
    this.$store.dispatch('getMeInfo');
    //console.log(this.$store.state.auth.user);
  }
}
</script>

<style scoped>
.container {
}

.head_container {
  width: 100%;
  background-color: white;
  border-bottom: 1px solid #eeeeee;
  box-shadow: 0 0.5px 0.5px rgba(0, 0, 0, 0.006),
  0 1.1px 1.3px rgba(0, 0, 0, 0.008),
  0 2.1px 2.4px rgba(0, 0, 0, 0.01),
  0 3.8px 4.2px rgba(0, 0, 0, 0.012),
  0 7.1px 7.9px rgba(0, 0, 0, 0.014),
  0 17px 19px rgba(0, 0, 0, 0.02);
}

.head_content {
  max-width: 1050px;
  margin: auto;
  display: flex;
  justify-content: flex-start;
  align-items: center;
  padding: 4px 0px;
}

.head_content > .logo > img {
  width: 130px;
}

.head_content > .links {
  display: flex;
  justify-content: flex-start;
  margin-left: 40px;
}

.head_content > .links > div {
  font-size: 25px;
  cursor: pointer;
  padding: 10px 22px;
  border-radius: 4px;
  color: var(--navy-blue-bg-hover-color);
  position: relative;
}

.head_content > .links > div:hover {
  background-color: #f5f5f5;
}

.head_content > .links > div > .active_icon {
  display: none;
}

.head_content > .links > .active_button {
  color: var(--navy-red-bg-dark-color);
}

.head_content > .links > .active_button:after {
  content: "";
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 1px;
  border-top: 2px solid var(--navy-red-bg-dark-color);
  border-radius: 10px;
}

.head_content > .links > .active_button > .active_icon {
  display: block;
}

.head_content > .links > .active_button > .not_active_icon {
  display: none;
}

.head_content > .search_user {
  display: flex;
  justify-content: flex-start;
  align-items: center;
  width: 320px;
  border: 1px solid #c3c3c3;
  border-radius: 3px;
  font-size: 15px;
  padding: 3px 5px;
  color: #515151;
}

.head_content > .search_user:hover {
  border-color: #a5a5a5;
}

.head_content > .search_user > input {
  border: 0px;
  padding: 5px 10px;
  width: 100%;
  font-family: 'Poppins', sans-serif;
  color: #515151;
}

.head_content > .user {
  border-radius: 3px;
}

.user {
  margin-left: auto;
  position: relative;
}

.user > .info {
  display: flex;
  align-items: center;
  cursor: pointer;
  padding: 5px 7px;
  border-radius: 3px;
  color: var(--navy-blue-text-color);
}

.user > .info:hover {
  background-color: #f7f7f7;
}

.user > .info > .username {
  margin-left: 10px;
  font-family: 'Poppins', sans-serif;
  font-size: 14px;
}

.user > .info > img {
  border-radius: var(--navy-user-profile-border-radius);
  width: 33px;
  height: 33px;
}

.user > .info > i {
  margin-left: 3px;
  color: #3e4b66;
}

.user > .dropdown {
  position: absolute;
  background-color: white;
  width: 225px;
  border: 1px solid #e0e0e0;
  border-radius: 5px;
  right: 0px;
  top: 61px;

  box-shadow: 0 0.4px 0.5px rgba(0, 0, 0, 0.008),
  0 1.1px 1.3px rgba(0, 0, 0, 0.012),
  0 2px 2.4px rgba(0, 0, 0, 0.015),
  0 3.6px 4.2px rgba(0, 0, 0, 0.018),
  0 6.7px 7.9px rgba(0, 0, 0, 0.022),
  0 16px 19px rgba(0, 0, 0, 0.03);
}

.dropdown:after {
  right: 40px;
  top: -11px;
  border: solid transparent;
  content: "";
  height: 0;
  width: 0;
  position: absolute;
  pointer-events: none;
  border-color: rgba(0, 0, 0, 0);
  border-bottom-color: #ffffff;
  border-width: 10px;
  margin-top: -10px;
}

.dropdown > .top {
  padding: 10px;
}

.dropdown > .top > .user_profile {
  display: flex;
  justify-content: flex-start;
  align-items: center;
  cursor: pointer;
  background-color: #f8f8f8;
  padding: 5px 7px;
  border: 1px solid white;
  border-radius: 3px;
  transition: .3s;
}

.dropdown > .top > .user_profile:hover {
  border-color: #f1f1f1;
  box-shadow: 0 0px 0.5px rgba(0, 0, 0, 0.006),
  0 0px 1.3px rgba(0, 0, 0, 0.008),
  0 0px 2.4px rgba(0, 0, 0, 0.01),
  0 0px 4.2px rgba(0, 0, 0, 0.012),
  0 0px 7.9px rgba(0, 0, 0, 0.014),
  0 0px 19px rgba(0, 0, 0, 0.02);
}

.dropdown > .top > .user_profile > img {
  width: 50px;
  border-radius: var(--navy-user-profile-border-radius);
}

.dropdown > .top > .user_profile > .info {
  margin-left: 8px;
}

.dropdown > .top > .user_profile > .info > .name {
  font-family: 'Montserrat', sans-serif;
  font-size: 14px;
}

.dropdown > .top > .user_profile > .info > .rank {
  font-family: 'Poppins', sans-serif;
  font-size: 13px;
  color: #808080;
}

.dropdown > .top > .mentor_apply_button {
  background-color: var(--navy-red-bg-color);
  color: white;
  padding: 5px 10px;
  cursor: pointer;
  margin-top: 20px;
  font-family: 'Poppins', sans-serif;
  font-size: 13px;
  text-align: center;
  border-radius: 4px;
}

.dropdown > .top > .mentor_apply_button:hover {
  background-color: var(--navy-red-bg-dark-color);
}

.dropdown > .links {
  border-top: 1px solid #e9e9e9;
  border-bottom: 1px solid #e9e9e9;
  padding: 4px 0px;
}

.dropdown > .links > div {
  cursor: pointer;
  padding: 10px 14px;
  display: flex;
  align-items: center;
  font-family: 'Nunito', sans-serif;
  font-size: 14px;
  color: #404040;
  transition: .2s;
}

.dropdown > .links > div:hover {
  background-color: #f1f1f1;
}

.dropdown > .links > div > i {
  margin-right: 7px;
}

.dropdown > .links > .logout {
  color: #c81616;
}

.dropdown > .links > .logout:hover {
  background-color: #fff1f1;
}

.dropdown > .footer {
  width: 100%;
  display: flex;
  flex-wrap: wrap;
  background-color: #f1f1f1;
  padding: 5px 10px;
}

.dropdown > .footer > div {
  margin: 5px;
  font-family: 'Poppins', sans-serif;
  font-size: 11px;
  cursor: pointer;
  color: #585858;
}

.dropdown > .footer > div:hover {
  text-decoration: underline;
  color: #858585;
}

.main_container {
  width: 100%;
  background-color: #f5f5f5;
}

.main_content {
  max-width: 1050px;
  margin: auto;
  min-height: 600px;
}
</style>