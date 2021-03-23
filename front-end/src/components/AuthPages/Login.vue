<template>
  <auth-template
      :title="'Hoşgeldin!'"
      :backgroundImage="'login.jpg'"
      :backgroundText="'Mentor BUl BLa BAL BLA BAL'">
    <template v-slot:form>
      {{ $v.users }}
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
import AuthInput from "@/components/authPages/Shared/Input";
import AuthButton from "@/components/authPages/Shared/Button";
import AuthTemplate from "@/components/authPages/Shared/Template";

import {required} from 'vuelidate/lib/validators'

export default {
  name: "Login",
  data() {
    return {
      users: ''
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
    users: {
      required
    }
  }

}
</script>

<style scoped>
</style>
