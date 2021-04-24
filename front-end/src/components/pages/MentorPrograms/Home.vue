<template>
  <div>
    <div class="content">
      <router-view/>
    </div>
    <page-title :text="' Mentor Programları'"/>
  </div>
</template>

<script>
export default {
  name: "Home",
  components: {
    PageTitle: () => import('@/components/pages/shared/Title')
  },
}
</script>

<style scoped>
.content {
  background-color: white;
  padding: 15px;
  border-radius: 4px;
}
</style>