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
  font-size: 20px;
  margin-bottom: 20px;
  display: inline-block;
  padding: 6px 19px;
  background-color: var(--navy-red-bg-color);
  color: white;
  border-radius: 4px;
}
</style>