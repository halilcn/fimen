<template>
  <div class="home_page">
    <div class="top">
      <div class="logo">
        <img src="@/assets/images/logos/red.png" alt="fimen">
      </div>
      <div class="links">
        <router-link
            tag="a"
            to="/giris">
          GİRİŞ YAP
        </router-link>
        <router-link
            tag="a"
            to="/kayit">
          KAYIT OL
        </router-link>
      </div>
    </div>
    <div class="content">
      <img class="image" src="@/assets/images/homePage/vektor.png">
      <div class="introduction">
        <div class="text">
          <span>
          HEDEFİNE GİDEN YOLDA,
          </span>
          <span>
           DOĞRU MENTORU BUL !
          </span>
          <span class="mobile">
            HEDEFİNE GİDEN YOLDA DOĞRU MENTORU BUL !
          </span>
        </div>
        <div class="fast_register">
          <div class="title">
            Hemen sende kayıt ol!
          </div>
          <div class="form">
            <input
                type="text"
                name="email"
                placeholder="E-mail"
                v-model="email">
            <div
                class="button"
                :class="{'disable_button':!isEmailFull}"
                @click="registerNextStep">
              devam et
            </div>
          </div>
          <div class="info_text">
            <i class="fas fa-info-circle"></i>
            mentorluk içinde kayıt olmak gerekir.
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "HomePage",
  data() {
    return {
      email: ''
    }
  },
  methods: {
    registerNextStep() {
      this.$store.commit('setFastRegisterEmail', this.email);
      this.$router.push('kayit');
    }
  },
  computed: {
    isEmailFull() {
      return this.email.length > 0;
    }
  },
}
</script>

<style scoped>
.home_page {
  height: 100%;
}

.home_page > .top {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.top > .logo > img {
  width: 100%;
}

.top > .links {
  margin-right: 20px;
}

.top > .links > a {
  margin: 0px 20px;
  text-decoration: none;
  font-family: 'Montserrat', sans-serif;
  font-size: 17px;
  color: #FF7268;
  padding: 10px 15px;
  border-radius: 4px;
  transition: .3s;
}

.top > .links > a:hover {
  background-color: #ffeeed;
}

.top > .logo > img {
  width: 230px;
}

.home_page > .content {
  display: flex;
  justify-content: flex-start;
  padding: 20px 40px;
  height: 100%;
}

.content > img {
  width: 70%;
  height: 80%;
  object-fit: cover;
  position: absolute;
  right: 0px;
  bottom: 0px;

}

.content > .introduction {
  width: 100%;
  z-index: 1;
}

.content > .introduction > .text {
  font-family: 'Rubik', sans-serif;
  font-weight: 600;
  font-size: 55px;
  display: flex;
  flex-direction: column;
  color: #2b374f;
}

.content > .introduction > .text > span {
  margin: 10px 0px;
}

.content > .introduction > .text > .mobile {
  display: none;
}

.content > .introduction > .fast_register {
  margin-top: 20px;
}

.fast_register > .title {
  font-family: 'Montserrat', sans-serif;
  font-weight: 500;
  font-size: 17px;
  margin-bottom: 20px;
  color: #2b374f;
}

.fast_register > .form {
  display: flex;
  align-items: center;
}

.fast_register > .form > input {
  padding: 8px 17px;
  border: 1px solid #c6c6c6;
  border-radius: 3px;
  transition: .3s;
  width: 220px;
  font-family: 'Poppins', sans-serif;
  color: #2b374f;
}

.fast_register > .form > input:focus {
  transform: scale(1.02);
  border-color: #FF7268;
}

.fast_register > .form > .button {
  font-family: 'Poppins', sans-serif;
  font-weight: 500;
  font-size: 15px;
  margin-left: 8px;
  cursor: pointer;
  padding: 5px 10px;
  border-radius: 3px;
  color: #FF7268;
}

.fast_register > .form > .button:hover {
  background-color: #fff0ed;
}

.fast_register > .form > .disable_button {
  pointer-events: none;
  opacity: .4;
}

.fast_register > .info_text {
  font-family: 'Montserrat', sans-serif;
  font-size: 11px;
  color: #8a8a8a;
  margin-top: 5px;
}

@media only screen and (max-width: 768px) {
  .home_page > .top {
  }

  .home_page > .content {
    padding: 10px 20px;
  }

  .top > .logo > img {
    width: 150px;
  }

  .top > .links {
    margin: 0px
  }

  .top > .links > a {
    margin: 0px;
    font-size: 14px;
    padding: 5px 10px;
  }

  .content > img {
    width: 100%;
    height: 100%;
    top: 60px;
  }

  .content > .introduction {
    display: flex;
    flex-direction: column;
    justify-content: space-around;
  }

  .content > .introduction > .text {
    font-size: 40px;
  }

  .content > .introduction > .text > .mobile {
    display: block;
    text-space: 300;
  }

  .content > .introduction > .text > span {
    display: none;
    text-align: center;
    line-height: 2.1;
  }

  .content > .introduction > .fast_register {
    background-color: white;
    padding: 10px;
    border-radius: 3px;

    box-shadow: 0 0px 0.6px rgba(0, 0, 0, 0.051),
    0 0px 1.5px rgba(0, 0, 0, 0.073),
    0 0px 2.8px rgba(0, 0, 0, 0.09),
    0 0px 4.9px rgba(0, 0, 0, 0.107),
    0 0px 9.2px rgba(0, 0, 0, 0.129),
    0 0px 22px rgba(0, 0, 0, 0.18);

  }

  .fast_register > .title {
    text-align: center;
  }

  .fast_register > .form > input {
    width: 65%;
  }

}

</style>
