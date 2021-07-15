<template>
  <div>
    {{ this.meetings }}
    <calendar-detail-popup/>
    çift popup sorunu
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
        events: this.meetings
      }
    }
  },
  props: ['meetings'],
  components: {
    FullCalendar,
    CalendarDetailPopup: () => import('@/components/pages/myActivePrograms/shared/calendarFile/CalendarDetailPopup')
  },
  methods: {
    handleDateClick(arg) {
      this.$store.commit('setShowPopup', true);
      console.log(arg.address);
      //  alert('date click! ' + arg.event)
    }
  },
  watch: {
    meetings() {
      this.meetings.forEach((item) => {
        console.log(item);
        item.title = 'Toplantı'
      });
    }
  },
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