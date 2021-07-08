<template>
  <bg-white-template>
    <template slot="content">
     <router-view/>
    </template>
  </bg-white-template>
</template>

<script>
export default {
  name: "Home",
  components: {
    BgWhiteTemplate: () => import('@/components/pages/shared/BgWhiteTemplate'),
  }
}
</script>

<style scoped>

</style>