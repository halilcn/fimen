<template>
  <div class="program">
    <div class="title">
      Başlık başlık başlık başlık başlık
    </div>
    <div class="program_content">
      <div class="filter">
        <div class="title">
          <i class="fas fa-filter"></i>
          Filtreler
        </div>
        <div class="filter_list">
          <div class="item">
            <div class="title">
              filtre başlığı
            </div>
            <div class="content">
              içerik
            </div>
          </div>
        </div>
      </div>
      <div class="program_appear_list">
        başvuran listesi
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "ProgramDetail"
}
</script>

<style scoped>
.program {
}

.program > .title {
  font-family: 'Poppins', sans-serif;
  font-weight: 500;
  font-size: 22px;
  color: var(--navy-blue-text-color);
}

.program_content {
  margin-top: 20px;
  display: flex;
  justify-content: space-between;
}

.program_content > .filter {
  padding: 10px;
  width: 24%;
  border-radius: 5px;
  box-shadow: 0 0px 0.4px rgba(0, 0, 0, 0.014),
  0 0px 1.1px rgba(0, 0, 0, 0.02),
  0 0px 2px rgba(0, 0, 0, 0.025),
  0 0px 3.6px rgba(0, 0, 0, 0.03),
  0 0px 6.7px rgba(0, 0, 0, 0.036),
  0 0px 16px rgba(0, 0, 0, 0.05);

}

.filter > .title {
  font-family: 'Poppins', sans-serif;
  font-weight: 400;
  color: var(--navy-blue-text-color);
  text-align: center;
}

.filter > .filter_list {
  margin-top: 13px;
  display: flex;
  flex-direction: column;
}

.filter > .filter_list > .item {
  display: flex;
  justify-content: space-between;
}

.filter > .filter_list > .item > .title {
  font-family: 'Poppins', sans-serif;
  font-weight: 300;
}

.filter > .filter_list > .item > .content {

}

.program_content > .program_appear_list {
  width: 73%;
}
</style>