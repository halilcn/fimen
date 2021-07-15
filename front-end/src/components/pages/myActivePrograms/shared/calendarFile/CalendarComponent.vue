<template>
  <div>
    <calendar :meetings="meetings"/>
  </div>
</template>

<script>
export default {
  name: "CalendarComponent",
  data() {
    return {
      meetings: []
    }
  },
  components: {
    Calendar: () => import('@/components/pages/myActivePrograms/shared/calendarFile/Calendar')
  },
  created() {
    this.$store.dispatch('getMentorMenteeProgramMeetings')
        .then(res => {
          this.meetings = res;
        });
  }
}
</script>

<style scoped>

</style>