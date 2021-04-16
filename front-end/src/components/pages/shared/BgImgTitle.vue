<template>
  <div class="bg_img_title">
    <img :src="require('@/assets/images/'+image)"/>
    <div class="filter"></div>
    <div class="title">
      {{ title }}
    </div>
  </div>
</template>

<script>
export default {
  name: "BgImgTitle",
  props: {
    image: {
      required: true
    },
    title: {
      required: true
    }
  }
}
</script>

<style scoped>
.bg_img_title {
  position: relative;
  width: 100%;
  height: 180px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.bg_img_title > img {
  width: 100%;
  height: 180px;
  object-fit: cover;
  position: absolute;
  border-radius: 10px;
}

.bg_img_title > .filter {
  background-color: #000000;
  opacity: .5;
  position: absolute;
  width: 100%;
  height: 180px;
  border-radius: 10px;
}

.bg_img_title > .title {
  position: relative;
  font-family: 'Rubik', sans-serif;
  font-size: 35px;
  color: #e2e2e2;
}

@media only screen and (max-width: 768px) {
  .bg_img_title, .bg_img_title > img, .bg_img_title > .filter {
    height: 100px;
  }

  .bg_img_title > .title {
    font-size: 25px;
  }
}
</style>