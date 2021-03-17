<template>
  <auth-template
      :title="'Hoşgeldin!'"
      :backgroundImage="'login.jpg'"
      :backgroundText="'Mentor BUl BLa BAL BLA BAL'">
    <template v-slot:form>
      <form @submit.prevent="postLogin">
        <auth-input
            :placeholder="'Telefon Numarası'"
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
import AuthInput from "@/components/Shared/Auth/AuthInput";
import AuthButton from "@/components/Shared/Auth/AuthButton";
import AuthTemplate from "@/components/Shared/Auth/AuthTemplate";

export default {
  name: "Login",
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
  }
}
</script>

<style scoped>
</style>
