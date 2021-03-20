<template>
  <div class="login">
    <div class="content">
      <img class="mobile_logo" src="@/assets/images/logos/red.png">
      <div class="title">
        {{ title }}
      </div>
      <div class="form_container">
        <slot name="form"/>
      </div>
      <div class="auth_actions">
        <div>
          Hesabın mı yok?
          <router-link
              tag="span"
              to="/kayit">
            Hesap oluştur!
          </router-link>
        </div>
        <div v-if="passwordResetShow">
          Şifreni mi unuttun?
          <router-link
              tag="span"
              to="/sifre-sifirla">
            Şifreni sıfırla
          </router-link>
        </div>
      </div>
    </div>
    <div class="background">
      <img class="bg_image" :src="require('@/assets/images/auth/'+backgroundImage)"/>
      <div class="filter"></div>
      <img class="logo_image" src="@/assets/images/logos/white.png">
      <div class="text">
        {{ backgroundText }}
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "AuthTemplate",
  props: {
    title: {
      required: true
    },
    backgroundImage: {
      required: true
    },
    backgroundText: {
      required: true
    },
    passwordResetShow: {
      default: true
    }
  }
}
</script>

<style scoped>
.login {
  height: 100%;
  width: 100%;
  display: flex;
  justify-content: flex-start;
}

.login > .content {
  width: 45%;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}

.login > .content > .mobile_logo {
  width: 170px;
  position: absolute;
  top: 20px;
  display: none;
}

.login > .content .title {
  font-family: 'Poppins', sans-serif;
  font-weight: 500;
  font-size: 35px;
  margin-bottom: 15px;
  color: #2b374f;
  text-align: center;
}

.login > .content > .form_container {
  width: 70%;
}

.login > .content > .auth_actions {
  margin-top: 40px;
  font-size: 14px;
  color: #5a5a5a;
}

.auth_actions > div {
  margin-top: 8px;
  font-family: 'Montserrat', 'sans-serif';
}

.auth_actions > div > a {
  text-decoration: none;
  font-family: 'Poppins', sans-serif;
  font-weight: 400;
  color: #5a5a5a;
}

.auth_actions > div > a:hover {
  text-decoration: underline;
  color: #2b374f;
}

.login > .background {
  position: relative;
  width: 55%;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}

.login > .background > .bg_image {
  width: 100%;
  height: 100%;
  object-fit: cover;
  position: absolute;
}

.login > .background > .filter {
  position: absolute;
  background-color: #ff7268;
  top: 0px;
  width: 100%;
  height: 100%;
  opacity: .9;
}

.login > .background > .logo_image {
  position: absolute;
  width: 200px;
  top: 15px;
}

.login > .background > .text {
  width: 60%;
  position: relative;
  font-family: 'Rubik', sans-serif;
  font-weight: 400;
  font-size: 50px;
  color: white;
  text-align: center;
}

@media only screen and (max-width: 768px) {
  .login > .background {
    display: none;
  }

  .login > .content {
    width: 100%;
  }

  .login > .content > .mobile_logo {
    display: block;
  }
}
</style>

