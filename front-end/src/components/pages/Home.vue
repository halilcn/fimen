<template>
  <div class="container">
    <div class="head_container">
      <top/>
    </div>
    <div class="main_container">
      <div class="main_content">
        <router-view></router-view>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
      </div>
    </div>
    <apply-mentor-alert/>
    <!-- home pageasdkdasd
    {{ $store.state.auth.user }}--
    <router-view></router-view>
    <div
        @click="postLogout">
      Çıkış
    </div>-->
  </div>
</template>

<script>

export default {
  name: "Home",
  components: {
    Top: () => import( "@/components/pages/shared/Top"),
    ApplyMentorAlert: () => import( "@/components/pages/shared/ApplyMentorAlert"),
  },
  created() {
    this.$store.dispatch('getMeInfo');
    //console.log(this.$store.state.auth.user);
  }
}
</script>

<style scoped>
.container {
}

.head_container {
  width: 100%;
  background-color: white;
  border-bottom: 1px solid #eeeeee;
  box-shadow: 0 0.5px 0.5px rgba(0, 0, 0, 0.006),
  0 1.1px 1.3px rgba(0, 0, 0, 0.008),
  0 2.1px 2.4px rgba(0, 0, 0, 0.01),
  0 3.8px 4.2px rgba(0, 0, 0, 0.012),
  0 7.1px 7.9px rgba(0, 0, 0, 0.014),
  0 17px 19px rgba(0, 0, 0, 0.02);
}

.main_container {
  width: 100%;
  background-color: #f5f5f5;
}

.main_content {
  max-width: 1050px;
  margin: auto;
  min-height: 600px;
  padding: 20px 0px;
}

@media only screen and (max-width: 768px) {
  .head_container {
    padding: 0 10px;
  }

  .main_container {
    padding: 0 10px;
  }

  .main_content {
    padding: 10px 0;
  }
}
</style>