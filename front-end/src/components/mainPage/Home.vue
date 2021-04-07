<template>
  <div class="container">
    <div class="head_container">
      <div class="head_content">
        <div class="logo">
          <img src="@/assets/images/logos/red.png"/>
        </div>
        <div class="links">
          <div>
            <i class="bi bi-house-door"></i>
          </div>
          <div>
            <i class="bi bi-bell"></i>
          </div>
        </div>
        <div class="user">
          <div class="info">
            <img src="https://ui-avatars.com/api/?name=halil+can&background=f2f2f2&size=128">
            <span class="username">hcan</span>
          </div>
          <div v-if="userDropdown" class="dropdown">
            <div class="top">
              <div class="user_profile">
                <img src="https://ui-avatars.com/api/?name=halil+can&background=f2f2f2&size=128">
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
              <div @click="postLogout">
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
        asdsa
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
      userDropdown: true
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
}

.head_content {
  max-width: 1050px;
  margin: auto;
  display: flex;
  justify-content: flex-start;
  align-items: center;
}

.head_content > .logo > img {
  width: 170px;
}

.head_content > .links {
  display: flex;
  justify-content: flex-start;
}

.head_content > .links > div {
  font-size: 25px;
  cursor: pointer;
  background-color: red;
  padding: 7px;
}

.head_content > .user {

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

.user > .dropdown {
  position: absolute;
  background-color: white;
  width: 210px;
  border: 1px solid #e0e0e0;
  border-radius: 5px;
  right: 0px;

  box-shadow: 0 0.4px 0.5px rgba(0, 0, 0, 0.008),
  0 1.1px 1.3px rgba(0, 0, 0, 0.012),
  0 2px 2.4px rgba(0, 0, 0, 0.015),
  0 3.6px 4.2px rgba(0, 0, 0, 0.018),
  0 6.7px 7.9px rgba(0, 0, 0, 0.022),
  0 16px 19px rgba(0, 0, 0, 0.03);
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
  margin-top: 10px;
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
  padding: 7px 14px;
  display: flex;
  align-items: center;
  font-family: 'Nunito', sans-serif;
  font-size: 14px;
  color: #404040;
}

.dropdown > .links > div > i {
  margin-right: 7px;
}

.dropdown > .links > div:hover {
  background-color: #f1f1f1;
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
  font-size: 12px;
  cursor: pointer;
  color: #585858;
}

.main_container {
  width: 100%;
  background-color: #2b374f;
}

.main_content {
  max-width: 1050px;
  margin: auto;
  background-color: #1a202c;
}
</style>