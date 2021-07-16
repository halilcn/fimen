<template>
  <div class="notification">
    <div class="title">
      <i class="fas fa-check-circle"></i>
      <router-link
          tag="a"
          :to="{name:'UserProfile',params:{username:data.username}}">
        {{ data.mentor_name }}
      </router-link>
      Tarafından Başlatılan Programa Seçildin!
    </div>
    <div class="content">
      <div class="explanation">
        Seçildiğin programı görüntülemek için sağ tarafta bulunan açılır menüden Aktif Programlarım'a tıklamalısın.
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "MentorProgramConfirmationNotification",
  props: {
    data: {
      required: true,
      type: Object
    }
  }
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

.title > a {
  text-decoration: none;
  margin-right: 8px;
  color: var(--navy-green-color);
  background-color: var(--navy-lght-green-color);
  padding: 2px 10px;
  border-radius: 5px;
}

.title > a:hover {
  background-color: var(--navy-lght-hover-green-color);
}

.content > .explanation {
  font-family: 'Poppins', sans-serif;
  font-weight: 300;
  font-size: 13px;
  margin-top: 5px;
}

</style>