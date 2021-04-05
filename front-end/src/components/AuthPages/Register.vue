<template>
  <auth-template
      :title="'Ücretsiz Hesap Oluştur'"
      :backgroundImage="'register.jpg'"
      :backgroundText="'Profilini Oluştur, Mentorunu Bul!'"
      :passwordResetShow="false"
      :type="'register'">
    <template v-slot:form>
      <form @submit.prevent="postRegisterStep1">
        <div class="inputs">
          <auth-input
              :placeholder="'Ad'"
              :type="'text'"
              :name="'name'"
              v-model="$v.user.name.$model"/>
          <auth-input
              :placeholder="'Soyad'"
              :type="'text'"
              :name="'surname'"
              v-model="$v.user.surname.$model"/>
          <input-status
              v-if="($v.user.name.$error && $v.user.name.$dirty) || $v.user.surname.$error && $v.user.surname.$dirty"
              :status="false">
            <template v-slot:errors>
              <span v-if="!$v.user.name.required">{{ $errors.required('Ad') }}</span>
              <span v-if="!$v.user.name.maxLength">
                {{ $errors.maxLength('Ad', $v.user.name.$params.maxLength.max) }}
              </span>
              <span v-if="!$v.user.surname.required">{{ $errors.required('Soyad') }}</span>
              <span v-if="!$v.user.surname.maxLength">
                {{ $errors.maxLength('Soyad', $v.user.surname.$params.maxLength.max) }}
              </span>
            </template>
          </input-status>
          <input-status
              v-if="(!$v.user.name.$error && $v.user.name.$dirty) && !$v.user.surname.$error && $v.user.surname.$dirty"
              :status="true"/>
        </div>
        <div class="inputs">
          <auth-input
              :placeholder="'Kulllanıcı Adı'"
              :type="'text'"
              :name="'username'"
              v-model="$v.user.username.$model"/>
          <input-status
              v-if="$v.user.username.$error && $v.user.username.$dirty"
              :status="false">
            <template v-slot:errors>
              <span v-if="!$v.user.username.required">{{ $errors.required('Kullanıcı Adı') }}</span>
              <span v-if="!$v.user.username.checkUniqueUsername">Bu kullanıcı adı daha önce kullanılmış.</span>
              <span v-if="!$v.user.username.minLength">
                {{ $errors.minLength('Kullanıcı Adı', $v.user.username.$params.minLength.min) }}
              </span>
              <span v-if="!$v.user.username.checkUsernameRegex">{{ $errors.regex('Kullanıcı Adı') }}</span>
            </template>
          </input-status>
          <input-status
              v-else-if="!$v.user.username.$error && $v.user.username.$dirty"
              :status="true"/>
        </div>
        <div class="inputs">
          <auth-input
              :placeholder="'E-mail'"
              :type="'email'"
              :name="'email'"
              v-model="$v.user.email.$model"/>
          <input-status
              v-if="$v.user.email.$error && $v.user.email.$dirty"
              :status="false">
            <template v-slot:errors>
              <span v-if="!$v.user.email.required">{{ $errors.required('E-mail') }}</span>
              <span v-if="!$v.user.email.checkUniqueEmail">Bu e-mail daha önce kullanılmış.</span>
              <span v-if="!$v.user.email.email">{{ $errors.email() }}</span>
            </template>
          </input-status>
          <input-status
              v-else-if="!$v.user.email.$error && $v.user.email.$dirty"
              :status="true"/>
        </div>
        <div class="inputs">
          <auth-input
              :placeholder="'Şifre'"
              :type="'password'"
              :name="'password'"
              v-model="$v.user.password.$model"/>
          <auth-input
              :placeholder="'Şifre Tekrar'"
              :type="'password'"
              :name="'password_repeat'"
              v-model="$v.user.repeat_password.$model"/>
          <input-status
              v-if="($v.user.password.$error && $v.user.password.$dirty) || ($v.user.repeat_password.$error && $v.user.repeat_password.$dirty)"
              :status="false">
            <template v-slot:errors>
              <span v-if="!$v.user.password.required">{{ $errors.required('Şifre') }}</span>
              <span v-if="!$v.user.repeat_password.required">{{ $errors.required('Şifre Tekrar') }}</span>
              <span v-if="!$v.user.repeat_password.sameAs">{{ $errors.sameAs('Şifreler') }}</span>
            </template>
          </input-status>
          <input-status
              v-if="(!$v.user.password.$error && $v.user.password.$dirty) && (!$v.user.repeat_password.$error && $v.user.repeat_password.$dirty)"
              :status="true"/>
        </div>
        <auth-button
            :isDisable="$v.user.$invalid"
            :text="'Devam Et'"/>
      </form>
    </template>
  </auth-template>
</template>
<script>
import AuthInput from "@/components/authPages/Shared/Input";
import AuthTemplate from "@/components/authPages/Shared/Template";
import AuthButton from "@/components/authPages/Shared/Button";
import InputStatus from "@/components/authPages/Shared/InputStatus";
import {customValidators} from "@/helpers/customValidators";
import {required, maxLength, minLength, email, sameAs, helpers} from 'vuelidate/lib/validators'

const checkUsernameRegex = () => {
  return !!helpers.regex('usernameRegex', '/^\\S*$/u');
};

const checkUniqueUsername = (value) => {
  return customValidators.checkUniqueUsername(value);
}

const checkUniqueEmail = (value) => {
  return customValidators.checkUniqueEmail(value);
}

export default {
  name: "Register",
  components: {
    AuthInput,
    AuthTemplate,
    AuthButton,
    InputStatus
  },
  data() {
    return {
      user: {
        name: '',
        surname: '',
        username: '',
        email: '',
        password: '',
        repeat_password: ''
      }
    }
  },
  created() {
    // Set Fast Register Email
    this.user.email = this.$store.state.fastRegisterEmail;
  },
  validations: {
    user: {
      name: {
        required,
        maxLength: maxLength(50)
      },
      surname: {
        required,
        maxLength: maxLength(50)
      },
      username: {
        required,
        maxLength: maxLength(15),
        minLength: minLength(3),
        checkUsernameRegex,
        checkUniqueUsername
      },
      email: {
        required,
        email,
        checkUniqueEmail
      },
      password: {
        required
      },
      repeat_password: {
        required,
        sameAs: sameAs('password')
      }
    }
  },
  methods: {
    postRegisterStep1() {
      this.$store.dispatch('registerStep1', {...this.user})
          .then(() => {
            this.$router.push('/kayit/email-dogrulama');
          });
    },
  },
  computed: {
    a() {
      return !this.user.username;
    }
  }
}
</script>

<style scoped>
.register {
  height: 100%;
  width: 100%;
  display: flex;
  justify-content: flex-start;
}

.register > .content {
  width: 45%;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}

.register > .background {
  width: 55%;
}

</style>
