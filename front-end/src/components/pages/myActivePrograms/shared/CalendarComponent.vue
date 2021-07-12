<template>
  <div>
    <calendar/>
  </div>
</template>

<script>
export default {
  name: "CalendarComponent",
  components: {
    Calendar: () => import('@/components/pages/myActivePrograms/shared/Calendar')
  },
  created() {
    alert('calendar')
  }
}
</script>

<style scoped>

</style>