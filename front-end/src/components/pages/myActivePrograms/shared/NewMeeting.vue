<template>
  <popup title="Yeni Toplantı">
    <template slot="popup">
      asdasd
    </template>
  </popup>
</template>

<script>
export default {
  name: "NewMeeting",
  components: {
    Popup: () => import('@/components/pages/shared/Popup')
  }
}
</script>

<style scoped>

</style>