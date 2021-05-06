<template>
  <div>
    <div class="content">
      <router-view/>
    </div>
  </div>
</template>

<script>
export default {
  name: "Home",
}
</script>

<style scoped>
.content {
  background-color: white;
  padding: 15px;
  border-radius: 4px;
}
</style>