<template>
  <div>
    <FullCalendar :options="calendarOptions"/>
  </div>
</template>

<script>
import '@fullcalendar/core/vdom'
import FullCalendar from '@fullcalendar/vue'
import dayGridPlugin from '@fullcalendar/daygrid'
import interactionPlugin from '@fullcalendar/interaction'


export default {
  name: "Calendar",
  data() {
    return {
      calendarOptions: {
        plugins: [dayGridPlugin, interactionPlugin],
        initialView: 'dayGridMonth',
        dateClick: this.handleDateClick,
        events: [
          {title: 'event 1', date: '2019-04-01'},
          {title: 'event 2', date: '2019-04-02'}
        ]
      }
    }
  },
  components: {
    FullCalendar // make the <FullCalendar> tag available
  },
  methods: {
    handleDateClick: function (arg) {
      alert('date click! ' + arg.dateStr)
    }
  }
}
</script>

<style scoped>

</style>