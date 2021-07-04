<template>
  <div class="main_component">
    <div class="infos">
      <div class="item">
        <i class="fas fa-history"></i>
        <div class="title">
          Geçirilen gün sayısı
        </div>
        <div class="value">
          12
        </div>
      </div>
    </div>
    <ul class="information_log_list">
      <li>
        bilgi
      </li>
      <li>
        bilgi aasdasd adaşpopooık lk lkmoıoı ş
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  name: "MainPage"
}
</script>

<style scoped>
.main_component {
  display: flex;
  justify-content: flex-start;
}

.main_component > .infos {
  width: 600px;
  display: flex;
  align-items: flex-start;
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

.infos > .item > i {
  position: absolute;
  left: -10px;
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
}

.information_log_list > li {
  padding: 10px;
  background-color: #f5f5f5;
  border-radius: 4px;
  margin-bottom: 4px;
}
</style>