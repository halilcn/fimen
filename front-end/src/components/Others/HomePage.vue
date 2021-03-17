<template>
  <div class="home_page">
    <div class="top">
      <div class="logo">
        <img src="@/assets/images/logos/red.png" alt="fimen">
      </div>
      <div class="links">
        <router-link
            tag="a"
            to="/">
          GİRİŞ YAP
        </router-link>
        <router-link
            tag="a"
            to="/">
          KAYIT OL
        </router-link>
      </div>
    </div>
    <div class="content">
      <img class="image" src="@/assets/images/homePage/vektor.png">
      <div class="introduction">
        <div class="text">
          <span>
          HEDEFİNE GİDEN YOLDA,
          </span>
          <span>
           DOĞRU MENTÖRÜ BUL!
          </span>
        </div>
        <div class="fast_register">
          <input type="text">
          <div class="button">
            Devam et
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "HomePage"
}
</script>

<style scoped>
.home_page {

}

.home_page > .top {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.top > .logo {

}

.top > .links {
  margin-right: 20px;
}

.top > .links > a {
  margin: 0px 20px;
  text-decoration: none;
  font-family: 'Montserrat', sans-serif;
  font-size: 17px;
  color: #FF7268;
  padding: 10px 15px;
  border-radius: 4px;
  transition: .3s;
}

.top > .links > a:hover {
  background-color: #ffeeed;
}

.top > .logo > img {
  width: 230px;
}

.home_page > .content {
  display: flex;
  justify-content: flex-start;
}

.content > img {
  width: 70%;
  height: 70%;
  object-fit: cover;
  position: absolute;
  right: 0px;
  bottom: 0px;

}

.content > .introduction {
  width: 100%;
  z-index: 1;
}
.content > .introduction > .text{
  font-family: 'Montserrat', sans-serif;
  font-weight: 600;
  font-size: 55px;
  display: flex;
  flex-direction: column;
}


</style>
