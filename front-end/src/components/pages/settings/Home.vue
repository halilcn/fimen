<template>
  <bg-white-template>
    <template slot="content">
      <div class="links">
        <div class="item active">
          Bildirimler & İzinler
        </div>
        <div class="item">
          Deneme
        </div>
      </div>
      <div class="setting_content">
        <component :is="activeComponent"/>
      </div>
    </template>
  </bg-white-template>
</template>

<script>
export default {
  name: "Home",
  data() {
    return {
      activeComponent: 'NotificationsSettings'
    }
  },
  components: {
    BgWhiteTemplate: () => import('@/components/pages/shared/BgWhiteTemplate'),
    NotificationsSettings: () => import('@/components/pages/settings/NotificationsSettings')
  }
}
</script>

<style scoped>
.links {
  display: flex;
  justify-content: flex-start;
  border-bottom: 1px solid #e0e0e0;
  padding-bottom: 13px;
}

.links > .item {
  font-family: 'Rubik', sans-serif;
  cursor: pointer;
  margin: 0 15px;
}

.links > .item.active {
  color: #1e66cd;
}

.setting_content {
  margin-top: 20px;
  padding: 10px;
}
</style>