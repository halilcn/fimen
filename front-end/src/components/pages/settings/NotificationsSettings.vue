<template>
  <div class="notifications_list">
    <div class="title">
      <i class="fas fa-lock"></i>
      İzinler
    </div>
    <div
        v-for="(permission,key) in permissions"
        :key="key"
        class="item">
      <div class="text">
        {{ permissionsText.cv_visible }}
      </div>
      <div @click="permissionAction(key)" class="check">
        <i v-if="permission" class="fas fa-unlock-alt active"></i>
        <i v-else class="fas fa-lock passive"></i>
      </div>
    </div>
    <!--   <div class="item">
        <div class="text">
          asdasdasdadsa asdas
        </div>
        <div class="check">
          <i class="fas fa-lock passive"></i>
        </div>
      </div>-->
    <div class="title">
      <i class="fas fa-bell"></i>
      Bildirimler
    </div>
    <div
        v-for="(notification,key) in notifications"
        :key="key"
        class="item">
      <template @click="notificationAction(key)">
        <div class="text">
          {{ notificationsText.mentor_program_notify }}
        </div>
        <div class="check">
          <i class="fas fa-bell active"></i>
        </div>
      </template>
    </div>
    <div class="item">
      <div class="text">
        asdasd adad ad asd ada dadas
      </div>
      <div class="check">
        <i class="fas fa-bell-slash passive"></i>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "NotificationsSettings",
  data() {
    return {
      permissionsText: {
        cv_visible: 'CV im herkes tarafından görüntülebilsin.'
      },
      notificationsText: {
        mentor_program_notify: 'Yeni mentor programı paylaşıldığında e-mail gelsin..'
      },
      permissions: {},
      notifications: {}
    }
  },
  methods: {
    getPermissions() {
      this.$store.dispatch('getPermissionsAndNotifications')
          .then(res => {
            console.log(res);
            this.permissions = res.permissions;
          })
    },
    postUserPermissions() {
      alert();
    },
    permissionAction(key) {
      console.log(Object.keys(this.permissions).find(itemKey => itemKey === key));
    },
    notificationAction(key) {
      alert(key);
    },
  },
  created() {
    this.getPermissions();
  }
}
</script>

<style scoped>
.notifications_list {

}

.notifications_list > .title {
  font-family: 'Poppins', sans-serif;
  font-size: 20px;
  color: var(--navy-blue-text-color);
}

.notifications_list > .item {
  margin: 10px 0;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.notifications_list > .item > .text {
  font-family: 'Poppins', sans-serif;
  font-weight: 400;
  font-size: 13px;
  color: var(--navy-blue-text-light-color);
}

.notifications_list > .item > .check > i {
  padding: 13px;
  border-radius: 5px;
  cursor: pointer;
  font-size: 17px;
}

.notifications_list > .item > .check > i.active {
  color: var(--navy-green-color);
}

.notifications_list > .item > .check > i.passive {
  color: var(--navy-red-text-color);
}

</style>