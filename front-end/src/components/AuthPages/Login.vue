<template>
  <auth-template
      :title="'Hoşgeldin!'"
      :backgroundImage="'login.jpg'"
      :backgroundText="'Mentor BUl BLa BAL BLA BAL'">
    <template v-slot:form>
      <form @submit.prevent="postLogin">
        <div class="inputs">
          <auth-input
              :placeholder="'E-posta'"
              :type="'text'"
              :name="'phone_number'"
              v-model="$v.user.email.$model"/>
          <input-status
              v-if="$v.user.email.$error && $v.user.email.$dirty"
              :status="false">
            <template v-slot:errors>
              <span v-if="!$v.user.email.required">{{ $errors.required('E-mail') }}</span>
              <span v-if="!$v.user.email.email">{{ $errors.email() }}</span>
            </template>
          </input-status>
        </div>
        <div class="inputs">
          <auth-input
              :placeholder="'Şifre'"
              :type="'password'"
              :name="'password'"
              v-model="$v.user.password.$model"
              @keyup.enter="postLogin"/>
          <input-status
              v-if="$v.user.password.$error && $v.user.password.$dirty"
              :status="false">
            asdsa
            <template v-slot:errors>
              <span v-if="!$v.user.password.required">{{ $errors.required('Şifre') }}</span>
            </template>
          </input-status>
        </div>
        <auth-button
            :isDisable="$v.user.$invalid"
            :text="'Giriş Yap'"/>
      </form>
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
        email: '',
        password: ''
      }
    }
  },
  components: {
    AuthInput,
    AuthButton,
    AuthTemplate,
    InputStatus
  },
  methods: {
    postLogin(event) {
      console.log(event);
      alert();
    }
  },
  validations: {
    user: {
      email: {
        required,
        email
      },
      password: {
        required
      }
    },
  }
}
</script>

<style scoped>
</style>
