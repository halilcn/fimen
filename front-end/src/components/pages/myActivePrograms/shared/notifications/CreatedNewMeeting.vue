<template>
  <li>
    {{ data }} new meeting
  </li>
</template>

<script>
export default {
  name: "CreatedNewMeeting",
  props: {
    data: {
      type: Object
    }
  }
}
</script>

<style scoped>

</style>