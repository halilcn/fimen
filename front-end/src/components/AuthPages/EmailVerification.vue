<template>
  <div class="container">
    <div class="content">
      <div class="title">
        Henüz kayıt işlemi tamamlanmadı.
      </div>
      <div class="input_form">
        <auth-input/>
        <div class="repeat_send_button">
          Tekrar Gönder
        </div>
      </div>
      <div class="send_button">
        Onayla ve Kayıt Ol
      </div>
    </div>
  </div>
</template>

<script>
import AuthInput from "@/components/authPages/Shared/Input";

export default {
  name: "EmailVerification",
  components: {
    AuthInput
  }
}
</script>

<style scoped>
.container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100%;
}

.content {
  width: 450px;
  height: 250px;
  padding: 10px 15px;
  border-radius: 5px;
  border: 1px solid #dbdbdb;

  box-shadow: 0 0px 0.6px rgba(0, 0, 0, 0.014),
  0 0px 1.5px rgba(0, 0, 0, 0.02),
  0 0px 2.8px rgba(0, 0, 0, 0.025),
  0 0px 4.9px rgba(0, 0, 0, 0.03),
  0 0px 9.2px rgba(0, 0, 0, 0.036),
  0 0px 22px rgba(0, 0, 0, 0.05);
}

.content > .input_form {
  display: flex;
  justify-content: flex-start;
  align-items: center;
  width: 100%;
}

.content > .input_form > .repeat_send_button {
  background-color: #ff0000;
}

.content > .send_button {
  padding: 5px 10px;
  cursor: pointer;
  background-color: var(--navy-blue-bg-color);
  transition: .3s;
}

.content > .send_button:hover {
  background-color: var(--navy-blue-bg-hover-color);
}
</style>