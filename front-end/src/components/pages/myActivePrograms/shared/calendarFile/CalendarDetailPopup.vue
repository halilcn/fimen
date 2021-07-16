<template>
  <popup title="Toplantı Detayları">
    <template slot="popup">
      <ul class="calendar_details">
        <li class="item">
          <div class="title">
            <i class="fas fa-calendar-alt"></i>
            Toplantı Zamanı
          </div>
          <div class="content">
            {{ moment(data.meeting_date).format('D MMMM H:m') }}
          </div>
        </li>
        <li class="item">
          <div class="title">
            <i class="fas fa-location-arrow"></i>
            Toplantı Adresi
          </div>
          <div class="content">
            <a :href="data.meeting_address" target="_blank" class="go_meeting">
              Toplantıya Git
            </a>
          </div>
        </li>
        <li class="item">
          <div class="title">
            <i class="fas fa-comment-dots"></i>
            Toplantı Açıklaması
          </div>
          <div class="content">
            {{ data.meeting_explanation }}
          </div>
        </li>
      </ul>
    </template>
  </popup>
</template>

<script>
export default {
  name: "CalendarDetail",
  props: ['data'],
  components: {
    Popup: () => import('@/components/pages/shared/Popup')
  }
}
</script>

<style scoped>
.calendar_details {
  padding: 0;
  margin: 5px 0;
  list-style-type: none;
  font-family: 'Poppins', sans-serif;
}

.calendar_details > .item {
  margin: 14px 0;
}

.calendar_details > .item > .title {
  font-size: 16px;
  color: #393939;
}

.calendar_details > .item > .content {
  font-size: 13px;
  color: #535353;
  margin-top: 3px;
}

.calendar_details > .item > .content > .go_meeting {
  text-decoration: none;
  padding: 6px 17px;
  border-radius: 4px;
  background-color: #1b911b;
  color: white;
  font-size: 12px;
}

.calendar_details > .item > .content > .go_meeting:hover {
  background-color: #158315;
}
</style>