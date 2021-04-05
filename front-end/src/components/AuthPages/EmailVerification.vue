<template>
  <div class="container">
    <div class="title">
      Henüz kayıt işlemi tamamlanmadı.
    </div>
    <div class="content">
      <div class="info_text">
        Lütfen {{ $store.state.auth.registerUser.email }} e-mail adresine gönderilen kodu girin.
      </div>
      <div class="input_form">
        <input
            maxlength="6"
            type="text"
            v-model="code">
        <div
            :class="{'timer_button':timer >  0}"
            class="repeat_send_button">
          <div
              v-if="timer === 0"
              @click="postEmailVerification"
              class="send_text">
            <span class="desktop">
              Tekrar Gönder
            </span>
            <span class="mobile">
               <i class="fas fa-redo-alt"></i>
            </span>
          </div>
          <div
              v-else
              class="wait_text">
            <i class="fas fa-clock"></i>
            {{ timer }}
          </div>
        </div>
      </div>
      <error
          v-if="isWrongCode"
          :message="'Girilen kod yanlış.'"/>
      <auth-button
          @click.native="postRegisterStep2"
          :text="'Onayla ve Kayıt Ol'"
          :isDisable="isButtonDisable"
          :isLoading="isLoading"/>
    </div>
  </div>
</template>

<script>
import AuthButton from "@/components/authPages/Shared/Button";
import Error from "@/components/shared/Error";

export default {
  name: "EmailVerification",
  data() {
    return {
      code: '',
      isWrongCode: false,
      timer: 120,
      isLoading: false
    }
  },
  components: {
    AuthButton,
    Error
  },
  computed: {
    isButtonDisable() {
      return !(this.code.length === 6);
    }
  },
  methods: {
    reduceTimer() {
      this.timer = 120;
      setInterval(() => {
        if (this.timer === 0) {
          return 0;
        }
        this.timer--;
      }, 1000);
    },
    postRegisterStep2() {
      this.isLoading = true;
      this.$store.dispatch('registerStep2', this.code)
          .then(() => {
            this.$router.push('/');
          }).catch(err => {
        if (err.status === 422 && err.config.url === '/email-verification-verify') {
          this.isWrongCode = true;
          return 0;
        }
        alert('Bir hata oluştu.');
      }).finally(() => {
        this.isLoading = false;
      });
    },
    postEmailVerification() {
      this.reduceTimer();
      this.$store.dispatch('postEmailVerification')
          .catch(() => {
            alert('E-mail gönderiminde bir hata oluştu!');
          });
    }
  },
  created() {
    if (this.$store.getters.checkRegisterUser) {
      this.$router.push('/kayit');
      return 0;
    }
    this.postEmailVerification();
  },
  watch: {
    code(val) {
      if (val.length === 6) {
        this.postRegisterStep2();
      }
    }
  }
}
</script>

<style scoped>
.container {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  height: 100%;
}

.container .title {
  font-family: 'Poppins', sans-serif;
  font-size: 18px;
  text-align: center;
  color: var(--navy-blue-text-color);
}

.container > .content {
  width: 450px;
  height: 210px;
  padding: 10px 15px;
  border-radius: 5px;
  border: 1px solid #dbdbdb;
  display: flex;
  flex-direction: column;
  justify-content: center;
  margin-top: 15px;

  box-shadow: 0 0px 0.6px rgba(0, 0, 0, 0.014),
  0 0px 1.5px rgba(0, 0, 0, 0.02),
  0 0px 2.8px rgba(0, 0, 0, 0.025),
  0 0px 4.9px rgba(0, 0, 0, 0.03),
  0 0px 9.2px rgba(0, 0, 0, 0.036),
  0 0px 22px rgba(0, 0, 0, 0.05);
}

.content > .info_text {
  font-family: 'Montserrat', sans-serif;
  font-size: 13px;
  color: #535353;
}

.content > .input_form {
  display: flex;
  width: 100%;
  align-items: center;
  margin-top: 5px;
}

.content > .input_form > input {
  width: 70%;
  padding: 5px 10px;
  border: 1px solid #ffaeae;
  border-radius: 3px;
  font-family: 'Nunito', sans-serif;
  letter-spacing: 25px;
  font-size: 30px;
  text-align: center;
  color: #484848;
}

.content > .input_form > .repeat_send_button {
  font-family: 'Poppins', sans-serif;
  font-weight: 500;
  font-size: 13px;
  width: 30%;
  text-align: center;
  margin-left: 8px;
  padding: 13px 10px;
  cursor: pointer;
  border-radius: 3px;
  background-color: var(--navy-red-bg-color);
  color: white;
}

.content > .input_form > .timer_button {
  cursor: default !important;
  background-color: #fff1f1 !important;
  color: var(--navy-red-bg-color) !important;
}

.content > .input_form > .repeat_send_button > .send_text > .mobile {
  display: none;
}

@media only screen and (max-width: 768px) {
  .container > .content {
    width: 90%;
  }

  .content > .input_form > input {
    width: 80%;
    padding: 10px 7px;
    letter-spacing: 15px;
    font-size: 20px;
  }

  .content > .input_form > .repeat_send_button {
    width: 20%;
  }

  .content > .input_form > .repeat_send_button > .send_text > .mobile {
    display: block;
  }

  .content > .input_form > .repeat_send_button > .send_text > .desktop {
    display: none;
  }
}

</style>