<template>
  <auth-template
      :title="'Hoşgeldin!'"
      :backgroundImage="'login.jpg'"
      :backgroundText="'Alanında Uzmanlardan Destek Al!'">
    <template v-slot:form>
      <form onsubmit="return false;">
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
        <error
            v-if="hasError"
            :message="'E-posta ya da Şifre yanlış.'"/>
        <auth-button
            :isDisable="$v.user.$invalid"
            :text="'Giriş Yap'"
            :isLoading="isLoading"
            @click.native="postLogin"/>
      </form>
    </template>
  </auth-template>
</template>
<script>
import AuthInput from "@/components/authPages/Shared/Input";
import AuthButton from "@/components/authPages/Shared/Button";
import AuthTemplate from "@/components/authPages/Shared/Template";
import InputStatus from "@/components/authPages/Shared/InputStatus";
import Error from "@/components/shared/Error";


import {email, required} from 'vuelidate/lib/validators'

export default {
  name: "Login",
  data() {
    return {
      user: {
        email: '',
        password: ''
      },
      isLoading: false,
      hasError: false
    }
  },
  components: {
    AuthInput,
    AuthButton,
    AuthTemplate,
    InputStatus,
    Error
  },
  methods: {
    postLogin() {
      this.isLoading = true;
      this.$store.dispatch('postLogin', {...this.user})
          .then(() => {
            //this.$route.path('/');
          })
          .catch(err => {
            if (err.response.status === 401) {
              this.hasError = true;
              return 0;
            }
          })
          .finally(() => {
            this.isLoading = false;
          });
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
