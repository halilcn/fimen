<template>
  <div class="content">
    <div class="top">
      <img src="@/assets/images/applyMentor/top-bg.jpg"/>
      <div class="filter"></div>
      <div class="title">
        Mentor Başvurusu
      </div>
    </div>
    <div class="title">
      Süreç Nasıl İşler ?
    </div>
    <ul class="steps">
      <li>
        <div class="number">
          <img src="../../assets/images/stepsNumber/1.png"/>
        </div>
        <div class="text">
          <div class="title">
            Gerekli Alanları Doldur
          </div>
          <div class="detail">
            asdsa da dsa sas dasd asas asdksaddasd asas asdksaddasd asas asdksaddasd asas asdksaddasd asas asdksaddasd
            asas asdksad
          </div>
        </div>
      </li>
      <li>
        <div class="text reverse_text">
          <div class="title">
            Profilini İnceleyelim
          </div>
          <div class="detail">
            asdsa da dsa sas dasd asas asdksaddasd asas asdksaddasd asas asdksaddasd asas asdksaddasd asas asdksaddasd
            asas asdksad
          </div>
        </div>
        <div class="number">
          <img src="../../assets/images/stepsNumber/2.png"/>
        </div>
      </li>
      <li>
        <div class="number">
          <img src="../../assets/images/stepsNumber/3.png"/>
        </div>
        <div class="text">
          <div class="title">
            Artık Mentorluk Verebilirsin !
          </div>
          <div class="detail">
            asdsa da dsa sas dasd asas asdksaddasd asas asdksaddasd asas asdksaddasd asas asdksaddasd asas asdksaddasd
            asas asdksad
          </div>
        </div>
      </li>
    </ul>
    <div class="apply_now_button">
      Hemen Başvur
      <i class="bi bi-caret-down"></i>
    </div>
    <div class="form">

    </div>
  </div>
</template>

<script>
export default {
  name: "ApplyMentor"
}
</script>

<style scoped>
.content {
  display: flex;
  flex-direction: column;
}

.content > .top {
  position: relative;
  width: 100%;
  height: 180px;
}

.content > .top > img {
  width: 100%;
  height: 180px;
  object-fit: cover;
  position: absolute;
  border-radius: 10px;
}

.content > .top > .filter {
  background-color: #000000;
  opacity: .3;
  position: absolute;
  width: 100%;
  height: 180px;
  border-radius: 10px;
}

.content > .top > .title {
  position: relative;
  font-family: 'Rubik', sans-serif;
  font-size: 35px;
  color: var(--navy-red-bg-dark-color);
  text-align: center;
}

.content > .title {
  font-family: 'Poppins', sans-serif;
  font-size: 30px;
  text-align: center;
}

.content > .steps {
  list-style-type: none;
  padding: 0px;
  width: 70%;
  margin: auto;
}

.steps > li {
  display: flex;
  justify-content: flex-start;
  align-items: center;
  padding: 10px 15px;
  background-color: #f1f1f1;
  border: 1px solid #eaeaea;
  border-radius: 6px;
  margin: 25px 0px;
  transition: .3s;

  box-shadow: 0 0.5px 0.8px rgba(0, 0, 0, 0.011),
  0 1.1px 2px rgba(0, 0, 0, 0.016),
  0 2.1px 3.8px rgba(0, 0, 0, 0.02),
  0 3.8px 6.7px rgba(0, 0, 0, 0.024),
  0 7.1px 12.5px rgba(0, 0, 0, 0.029),
  0 17px 30px rgba(0, 0, 0, 0.04);
}

.steps > li:hover {
  transform: translateY(-4px);
}

.steps > li > .number {
  width: 15%;
}

.steps > li > .number > img {
  width: 100px;
  height: 100px;
}

.steps > li > .text {
  width: 85%;
  padding: 5px 25px;
  text-align: left;
}

.steps > li > .reverse_text {
  text-align: right;
}

.steps > li > .text > .title {
  font-family: 'Rubik', 'sans-serif';
  font-size: 20px;
}

.steps > li > .text > .detail {
  margin-top: 4px;
  font-family: 'Montserrat', 'sans-serif';
  font-size: 15px;
  color: #414141;
}

.content > .apply_now_button {
  margin: 25px auto;
  padding: 12px 17px;
  cursor: pointer;
  font-family: 'Rubik', sans-serif;
  font-size: 15px;
  background-color: var(--navy-red-bg-color);
  color: white;
  border-radius: 3px;
}

.content > .apply_now_button:hover {
  background-color: var(--navy-red-bg-dark-color);
}
</style>