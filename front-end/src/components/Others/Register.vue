<template>
  <auth-template
      :title="'Ücretsiz Hesap oluştur'"
      :backgroundImage="'register.jpg'"
      :backgroundText="'Profilini Oluştur, Mentörünü Bul!'">
    <template v-slot:form>
      <form>
        <div class="inputs_container">
          <auth-input
              :placeholder="'Ad'"
              :type="'text'"
              :name="'name'"/>
          <auth-input

              :placeholder="'Soyad'"
              :type="'text'"
              :name="'surname'"/>
        </div>
        <div class="inputs_container">
          <auth-input
              :placeholder="'Kulllanıcı Adı'"
              :type="'text'"
              :name="'username'"/>
        </div>
        <div class="inputs_container">
          <auth-input
              :placeholder="'Telefon Numarası'"
              :type="'phone'"
              :name="'phone'"/>
        </div>
        <div class="inputs_container">
          <div class="inputs_container">
            <auth-input
                :placeholder="'Şifre'"
                :type="'password'"
                :name="'password'"/>
          </div>
          <div class="inputs_container">
            <auth-input
                :placeholder="'Şifre Tekrar'"
                :type="'password'"
                :name="'password_repeat'"/>
          </div>
        </div>
        <auth-button :text="'Kayıt Ol'"/>
      </form>
    </template>
  </auth-template>
</template>

<script>
import AuthInput from "@/components/Shared/Auth/AuthInput";
import AuthTemplate from "@/components/Shared/Auth/AuthTemplate";
import AuthButton from "@/components/Shared/Auth/AuthButton";

export default {
  name: "Register",
  components: {
    AuthInput,
    AuthTemplate,
    AuthButton
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
  background-color: red;
  width: 55%;
}

.inputs_container {
  display: flex;
  justify-content: flex-start;

}
</style>
