<template>
  <div class="notification">
    <div class="content">
      <i class="far fa-sad-tear"></i>
      {{ data.mentor_name }} kullanıcı isimli mentor, aranızdaki programı sonlandırdı.
    </div>
  </div>
</template>

<script>
export default {
  name: "DestroyMentorMenteeProgramNotification",
  props: ['data']
}
</script>

<style scoped>
.notification > .content {
  color: #c82a2a;
}
</style>