<template>
  <div class="content">
    <slot name="content"/>
  </div>
</template>

<script>
export default {
  name: "BgWhiteTemplate"
}
</script>

<style scoped>
.content {
  background-color: white;
  padding: 15px;
  border-radius: 4px;
  border: 1px solid #f6f6f6;
}
</style>