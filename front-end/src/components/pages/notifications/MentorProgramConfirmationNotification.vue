<template>
  <div class="notification">
    <div class="title">
      <i class="fas fa-check-circle"></i>
      progamr progkae mere asdsa Başlıklı Mentor Programına Seçildin!
    </div>
    <div class="content">
      <div class="explanation">
        açık lama a askdkas dsad asaksdka açık lama a askdkas dsad asaksdkaaçık lama a askdkas dsad asaksdkaaçık lama a
        askdkas dsad asaksdkaaçık lama a askdkas dsad asaksdkaaçık lama a askdkas dsad asaksdkaaçık lama a askdkas dsad
        asaksdkaaçık lama a askdkas dsad asaksdkaaçık lama a askdkas dsad asaksdkaaçık lama a askdkas dsad asaksdkaaçık
      </div>
      <div class="actions">
        <div class="accept_btn">
          Kabul Et
        </div>
        <div class="refuse_btn">
          Reddet
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "MentorProgramConfirmationNotification"
}
</script>

<style scoped>
.title {
  display: flex;
  align-items: center;
  font-family: 'Poppins', sans-serif;
  font-size: 18px;
  color: var(--navy-green-color);
}

.title > i {
  margin-right: 10px;
}

.content > .explanation {
  font-family: 'Poppins', sans-serif;
  font-weight: 300;
  font-size: 13px;
  margin-top: 5px;
}

.content > .actions {
  margin-top: 5px;
  display: flex;
}

.content > .actions > div {
  cursor: pointer;
  padding: 4px 12px;
  border-radius: 4px;
  margin-right: 10px;
  font-family: 'Poppins', sans-serif;
  font-size: 14px;
}

.content > .actions > .accept_btn {
  background-color: var(--navy-lght-green-color);
  color: var(--navy-green-color);
}

.content > .actions > .refuse_btn {
  background-color: var(--navy--lght-red-text-color);
  color: var(--navy-red-text-color);
}
</style>