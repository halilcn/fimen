<template>
  <auth-template
      :title="'Hoşgeldin!'"
      :backgroundImage="'login.jpg'"
      :backgroundText="'Mentor BUl BLa BAL BLA BAL'">
    <template v-slot:form>
      <form @submit.prevent="postLogin">
        {{ user.email }} --
        <div class="inputs">
          <auth-input
              :placeholder="'E-posta'"
              :type="'text'"
              :name="'phone_number'"
              :value="user.email"/>
          <input-status
              v-if="$v.user.email.$error && $v.user.email.$dirty"
              :status="false"
              :errors="returnErrors('asd')"/>
          {{ !$v.user.email.required }}
        </div>
        {{ returnErrors }}
        <div class="inputs">
          <auth-input
              :placeholder="'Şifre'"
              :type="'password'"
              :name="'password'"
              @keyup.enter="postLogin"/>
        </div>
        <auth-button :text="'Giriş Yap'"/>
      </form>
      <input type="text" v-model.trim="$v.user.email.$model">
      <input type="text" v-model="user.password">
      {{ $v.user.email.$error }}
    </template>
  </auth-template>
</template>
<script>
import AuthInput from "@/components/authPages/Shared/Input";
import AuthButton from "@/components/authPages/Shared/Button";
import AuthTemplate from "@/components/authPages/Shared/Template";
import InputStatus from "@/components/authPages/Shared/InputStatus";

import {email, required} from 'vuelidate/lib/validators'

export default {
  name: "Login",
  data() {
    return {
      user: {
        email: 'email',
        password: ''
      }
    }
  },
  methods: {
    postLogin(event) {
      console.log(event);
      alert();
    },
    returnErrors(type) {
      return [
          type,
        'asdad asd asd',
        'asdksadjsada'
      ];
    }
  },
  components: {
    AuthInput,
    AuthButton,
    AuthTemplate,
    InputStatus
  },
  validations: {
    user: {
      email: {
        required,
        email
      }
    },
    password: {}
  }

}
</script>

<style scoped>
</style>
