<template>
  <div class="error">
    <i class="bi bi-exclamation-square"></i>
    <span>
      {{ text }}
    </span>
  </div>
</template>

<script>
export default {
  name: "ErrorAlert",
  props: {
    text: {
      required: false,
      default: 'Bİr hata oluştu'
    }
  }
}
</script>

<style scoped>
.error {
  padding: 7px 15px;
  margin: 5px 0px;
  background-color: #ffe8e8;
  color: #b71212;
  font-family: 'Rubik', 'sans-serif';
  font-size: 13px;
  display: flex;
  border: 1px solid #ffc5c5;
  border-radius: 3px;
}

.error > i {
  margin-right: 10px;
}

@media only screen and (max-width: 768px) {
  .error {
    font-size: 11px;
  }
}
</style>