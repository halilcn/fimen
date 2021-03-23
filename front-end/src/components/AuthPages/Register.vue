<template>
  <auth-template
      :title="'Ücretsiz Hesap Oluştur'"
      :backgroundImage="'register.jpg'"
      :backgroundText="'Profilini Oluştur, Mentörünü Bul!'"
      :passwordResetShow="false">
    <template v-slot:form>
      <form>
        <div class="inputs">
          <auth-input
              :placeholder="'Ad'"
              :type="'text'"
              :name="'name'"/>
          <auth-input
              :placeholder="'Soyad'"
              :type="'text'"
              :name="'surname'"/>
          <input-status
              :status="true"/>
        </div>
        <div class="inputs">
          <auth-input
              :placeholder="'Kulllanıcı Adı'"
              :type="'text'"
              :name="'username'"/>
        </div>
        <div class="inputs">
          <auth-input
              :placeholder="'E-mail'"
              :type="'email'"
              :name="'email'"
              :value="$store.state.fastRegisterEmail"/>
          <input-status
              :status="false"
              :errors="['asdadada asda d','asdada asdsa']"/>
        </div>
        <div class="inputs">
          <auth-input
              :placeholder="'Şifre'"
              :type="'password'"
              :name="'password'"/>
          <auth-input
              :placeholder="'Şifre Tekrar'"
              :type="'password'"
              :name="'password_repeat'"/>
        </div>
        <auth-button :text="'Kayıt Ol'"/>
      </form>
    </template>
  </auth-template>
</template>

<script>
import AuthInput from "@/components/authPages/Shared/Input";
import AuthTemplate from "@/components/authPages/Shared/Template";
import AuthButton from "@/components/authPages/Shared/Button";
import InputStatus from "@/components/authPages/Shared/InputStatus";

export default {
  name: "Register",
  components: {
    AuthInput,
    AuthTemplate,
    AuthButton,
    InputStatus
  },
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

.inputs {
  position: relative;
  display: flex;
  justify-content: flex-start;
}

.inputs .input_container {
  margin-left: 5px;
  margin-right: 5px;
}


</style>
