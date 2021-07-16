<template>
  <div>
    <calendar-detail-popup
        v-if="isShowCalendarDetailPopup"
        :data="calendarDetail"/>
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
      isShowCalendarDetailPopup: false,
      calendarDetail: {},
      calendarOptions: {
        plugins: [dayGridPlugin, interactionPlugin],
        initialView: 'dayGridMonth',
        eventClick: this.eventClickHandle,
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
    eventClickHandle(arg) {
      this.$store.commit('setShowPopup', true);
      this.isShowCalendarDetailPopup = true;
      this.calendarDetail = {
        meeting_date: arg.event.startStr,
        meeting_address: arg.event._def.extendedProps.address,
        meeting_explanation: arg.event._def.extendedProps.explanation,
      };
    }
  },
  watch: {
    meetings() {
      this.meetings.forEach((item) => {
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