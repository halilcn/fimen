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
  }
}
</script>

<style scoped>

</style>