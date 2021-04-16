<template>
  <div class="title">
    {{ text }}
  </div>
</template>

<script>
export default {
  name: "Title",
  props: {
    text: {
      required: true,
      type: String
    }
  }
}
</script>

<style scoped>
.title {
  font-family: 'Poppins', sans-serif;
  font-size: 23px;
}
</style>