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
          {title: 'etkinliğim benim', date: '2021-07-10'},
          {title: 'event 2', date: '2019-04-02'}
        ]
      }
    }
  },
  components: {
    FullCalendar
  },
  methods: {
    handleDateClick: function (arg) {
      console.log(arg);
      alert('date click! ' + arg.dateStr)
    }
  }
}
</script>

<style scoped>
.fc {
  font-family: 'Rubik', sans-serif;
}

td.fc-day, td.fc-day-number {
  cursor: pointer !important;
}
</style>