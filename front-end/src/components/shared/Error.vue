<template>
  <div class="error">
    <i class="fa fa-exclamation"></i>
    {{ message }}
  </div>
</template>

<script>
export default {
  name: "Error",
  props: {
    message: {
      type: String,
      default: 'Bir hata oluştu'
    }
  }
}
</script>

<style scoped>
.error {
  padding: 10px 15px;
  background-color: #fff4f4;
  border-left: #ff8a8a 1px solid;
  color: #e01c1c;
  font-family: 'Nunito', sans-serif;
  font-size: 14px;
  margin: 8px 0px;
}

i {
  margin-right: 5px;
}
</style>