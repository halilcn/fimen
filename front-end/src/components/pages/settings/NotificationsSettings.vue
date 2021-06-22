<template>
  <div class="notifications_list">
    <div class="title">
      <i class="fas fa-lock"></i>
      İzinler
    </div>
    <div
        v-for="(permissionStatus,key) in permissions"
        :key="key"
        @click="updateAction('permission',key)"
        class="item">
      <div class="text">
        {{ permissionsText[key] }}
      </div>
      <div class="check">
        <i v-if="permissionStatus" class="fas fa-unlock-alt active"></i>
        <i v-else class="fas fa-lock passive"></i>
      </div>
    </div>
    <div class="title">
      <i class="fas fa-bell"></i>
      Bildirimler
    </div>
    <div
        v-for="(notificationStatus,key) in notifications"
        :key="key"
        @click="updateAction('notification',key)"
        class="item">
      <div class="text">
        {{ notificationsText[key] }}
      </div>
      <div class="check">
        <i v-if="notificationStatus" class="fas fa-bell active"></i>
        <i v-else class="fas fa-bell-slash passive"></i>
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
        cv_visible: "CV'im herkese gözüksün."
      },
      notificationsText: {
        mentor_program_notify: 'Yeni mentor programı paylaşıldığında e-mail gelsin.'
      },
      permissions: {},
      notifications: {},
      postData: {
        type: '',
        value: null
      }
    }
  },
  methods: {
    getPermissions() {
      this.$store.dispatch('getPermissionsAndNotifications')
          .then(res => {
            this.permissions = res.permissions;
            this.notifications = res.notifications;
          })
    },
    updateAction(type, key) {
      let data;

      if (type === 'permission') {
        data = this.permissions;
      }

      if (type === 'notification') {
        data = this.notifications;
      }

      data[key] = !data[key];
      this.postData = {
        value: data[key],
        type: key
      };

      this.postPermissionsAndNotifications();
    },
    postPermissionsAndNotifications() {
      this.$store.dispatch('postPermissionsAndNotifications', this.postData);
    }
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
  cursor: pointer;
  padding: 5px 10px;
  border-radius: 4px;
}

.notifications_list > .item:hover {
  background-color: #f5f5f5;
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
  font-size: 17px;
}

.notifications_list > .item > .check > i.active {
  color: var(--navy-green-color);
}

.notifications_list > .item > .check > i.passive {
  color: var(--navy-red-text-color);
}

</style>