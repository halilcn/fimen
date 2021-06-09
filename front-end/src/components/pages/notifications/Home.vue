<template>
  <bg-white-template>
    <template slot="content">
      <div class="notifications_actions">
        <div class="all_delete-btn">
          <i class="fas fa-trash-alt"></i>
          Tümünü Sil
        </div>
      </div>
      <div class="notifications_list">
        <component
            class="item"
            :is="notificationComp"/>
      </div>
    </template>
  </bg-white-template>
</template>

<script>
export default {
  name: "Home",
  data() {
    return {
      notificationComp: 'MentorProgramConfirmationNotification'
    }
  },
  components: {
    BgWhiteTemplate: () => import('@/components/pages/shared/BgWhiteTemplate'),
    MentorProgramConfirmationNotification: () => import('@/components/pages/notifications/MenteeConfirmationNotification'),
  }
}
</script>

<style scoped>

.notifications_actions {
  display: flex;
  justify-content: flex-end;
  font-family: 'Poppins', sans-serif;
  font-size: 12px;
  border-bottom: 1px solid #dddddd;
  padding-bottom: 10px;
}

.notifications_actions > div {
  padding: 4px 12px;
  cursor: pointer;
  border-radius: 20px;
}

.notifications_actions > .all_delete-btn {
  color: var(--navy-red-text-color);
  background-color: #ffeeee;
}

.notifications_actions > .all_delete-btn:hover {
  background-color: #ffe6e6;
}

.notifications_list {
  margin-top: 20px;
}

.notifications_list > .item {
  width: 100%;
  background-color: #ffffff;
  padding: 14px;
  border-radius: 5px;
  box-shadow: 0 0px 0.3px rgba(0, 0, 0, 0.014),
  0 0px 0.8px rgba(0, 0, 0, 0.02),
  0 0px 1.5px rgba(0, 0, 0, 0.025),
  0 0px 2.7px rgba(0, 0, 0, 0.03),
  0 0px 5px rgba(0, 0, 0, 0.036),
  0 0px 12px rgba(0, 0, 0, 0.05);
}
</style>