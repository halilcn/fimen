<template>
  <div>
    home pageasdkdasd
    {{ $store.state.auth.user }}--
    <router-view></router-view>
    <div
        @click="postLogout">
      Çıkış
    </div>
  </div>
</template>

<script>
export default {
  name: "Home",
  methods: {
    postLogout() {
      this.$store.dispatch('postLogout')
          .then(() => {
            this.$router.push('/giris');
          });
    }
  },
  created() {
    this.$store.dispatch('getMeInfo');
    //console.log(this.$store.state.auth.user);
  }
}
</script>

<style scoped>

</style>