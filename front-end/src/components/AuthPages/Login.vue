<template>
  <auth-template
      :title="'Hoşgeldin!'"
      :backgroundImage="'login.jpg'"
      :backgroundText="'Mentor BUl BLa BAL BLA BAL'">
    <template v-slot:form>
      <form @submit.prevent="postLogin">
        <auth-input
            :placeholder="'E-posta'"
            :type="'text'"
            :name="'phone_number'"/>
        <auth-input
            :placeholder="'Şifre'"
            :type="'password'"
            :name="'password'"
            @keyup.enter="postLogin"/>
        <auth-button :text="'Giriş Yap'"/>
      </form>
    </template>
  </auth-template>
</template>
<script>
import AuthInput from "@/components/AuthPages/Shared/Input";
import AuthButton from "@/components/AuthPages/Shared/Button";
import AuthTemplate from "@/components/AuthPages/Shared/Template";

import useVuelidate from '@vuelidate/core'
import {required} from '@vuelidate/validators';


export default {
  name: "Login",
  setup() {
    return {
      v$: useVuelidate()
    }
  },
  data() {
    return {
      deneme: ''
    }
  },
  methods: {
    postLogin(event) {
      console.log(event);
      alert();
    }
  },
  components: {
    AuthInput,
    AuthButton,
    AuthTemplate
  },
  validations: {
    deneme: {
      required
    }
  }
}
</script>

<style scoped>
</style>
