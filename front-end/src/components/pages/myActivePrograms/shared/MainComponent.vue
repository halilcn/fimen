<template>
  <div class="main_component">
    <div class="infos">
      <div class="item">
        <div class="title">
          Geçirilen gün sayısı
        </div>
        <div class="value">
          {{ detailInfo.info.number_of_days_spent }}
        </div>
      </div>
    </div>
    <ul class="information_log_list">
      <li class="title">
        <i class="fas fa-history"></i>
        Son Hareketler
      </li>
      {{ detailInfo.notifications }}
      <li>
        bildgi bilgi bildgi bilgibildgi bilgi
      </li>
      <li>
        bildgi bilgi bildgi bilgibildgi bilgi
      </li>
      <li>
        bildgi bilgibildgi bilgibildgi bilgibildgi bilgibildgi bilgibildgi bilgi
      </li>
      <li>
        bildgi bilgibildgi bilgibildgi bilgibildgi bilgibildgi bilgibildgi bilgi
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  name: "MainPage",
  data() {
    return {
      'detailInfo': []
    }
  },
  methods: {
    getMentorMenteeProgramDetailInfo() {
      this.$store.dispatch('getMentorMenteeProgramDetailInfo')
          .then(res => {
            this.detailInfo = res;
          })
    }
  },
  created() {
    this.getMentorMenteeProgramDetailInfo();
  }
}
</script>

<style scoped>
.main_component {
  display: flex;
  align-items: flex-start;
}

.main_component > .infos {
  width: 600px;
  display: flex;
  align-items: flex-start;
  padding: 5px;
  border-radius: 4px;
  box-shadow: 0 0px 0.2px rgba(0, 0, 0, 0.011),
  0 0px 0.6px rgba(0, 0, 0, 0.016),
  0 0px 1.1px rgba(0, 0, 0, 0.02),
  0 0px 2px rgba(0, 0, 0, 0.024),
  0 0px 3.8px rgba(0, 0, 0, 0.029),
  0 0px 9px rgba(0, 0, 0, 0.04);
}

.infos > .item {
  position: relative;
  background-color: #eef0ff;
  display: flex;
  flex-direction: column;
  align-items: center;
  font-family: 'Rubik', sans-serif;
  padding: 7px;
  border-radius: 5px;
  color: #1771c1;
}

.infos > .item > .title {
  font-size: 13px;
}

.infos > .item > .value {
  font-size: 20px;
}

.main_component > .information_log_list {
  width: 100%;
  padding: 0;
  list-style-type: none;
  margin-top: 0;
  margin-left: 20px;
}

.information_log_list > .title {
  padding: 10px;
  background-color: #f5f8ff;
  color: #436bc6;
  font-family: 'Rubik', sans-serif;
}

.information_log_list > li {
  padding: 10px;
  background-color: #f5f5f5;
  border-radius: 4px;
  margin-bottom: 4px;
}
</style>