<template>
  <transition name="slide-down">
    <ul v-if="searchText.length > 0" class="search_user">
      <li
          v-for="(user,index) in users"
          :key="index">
        <img :src="user.image">
        <div class="info">
          <div class="name">
            {{ user.name }}
          </div>
          <div class="username">
            @{{ user.username }}
          </div>
        </div>
        <div class="other_infos">
          <div v-if="user.mentor" class="competency_name">
            {{ user.mentor.competency_name }}
          </div>
          <div class="role">
            mentee
            <template v-if="user.mentor">
              & mentor
            </template>
          </div>
        </div>
      </li>
      <li v-if="users.length === 0" class="not_user">
        Hiç kullanıcı yok
      </li>
    </ul>
  </transition>
</template>

<script>
export default {
  name: "TopSearchUser",
  data() {
    return {
      users: []
    }
  },
  props: {
    searchText: {
      required: true,
      type: String
    }
  },
  watch: {
    searchText(value) {
      this.$store.dispatch('searchUser', value)
          .then(res => {
            this.users = res;
          });
    }
  }
}
</script>

<style scoped>
.search_user {
  position: absolute;
  top: 30px;
  left: 0;
  width: 100%;
  max-height: 400px;
  overflow-y: auto;
  padding: 0;
  list-style-type: none;
  z-index: 10;
  background-color: white;
  border-radius: 5px;

  box-shadow: 0 0px 0.3px rgba(0, 0, 0, 0.031),
  0 0px 0.7px rgba(0, 0, 0, 0.044),
  0 0px 1.4px rgba(0, 0, 0, 0.055),
  0 0px 2.5px rgba(0, 0, 0, 0.066),
  0 0px 4.6px rgba(0, 0, 0, 0.079),
  0 0px 11px rgba(0, 0, 0, 0.11);
}

.search_user > li {
  display: flex;
  align-items: center;
  padding: 12px;
  cursor: pointer;
}

.search_user > li:hover {
  background-color: #f6f6f6;
}

.search_user > li > img {
  width: 35px;
  border-radius: var(--navy-user-profile-border-radius);
}

.search_user > li > .info {
  margin-left: 10px
}

.search_user > li > .info > .name {
  font-family: 'Rubik', sans-serif;
  font-size: 15px;
}

.search_user > li > .info > .username {
  font-family: 'Montserrat', 'sans-serif';
  font-size: 12px;
}

.search_user > li > .other_infos {
  margin-left: auto;
  display: flex;
  align-items: center;
}

.search_user > li > .other_infos > div {
  padding: 3px 7px;
  border-radius: 7px;
}

.search_user > li > .other_infos > .competency_name {
  background-color: #f1f1f1;
  color: var(--navy-light-black);
  font-family: 'Montserrat', 'sans-serif';
  font-size: 13px;
  margin-right: 5px;
}

.search_user > li > .other_infos > .role {
  font-family: 'Poppins', sans-serif;
  font-size: 12px;
  background-color: #e6f4ff;
  color: var(--navy-mentor-mentee-text-color);
  border: 1px solid #d4eaff;
}

.search_user > .not_user {
  font-family: 'Poppins', sans-serif;
  font-size: 12px;
  color: var(--navy-light-black);
}

.search_user > .not_user:hover {
  background-color: transparent;
}

.slide-down-enter-active {
  animation: slide-down-enter .3s;
}

.slide-down-leave-active {
  animation: slide-down-leave .3s;
}

@keyframes slide-down-enter {
  from {
    top: 37px;
    opacity: 0;
  }
  to {
    top: 30px;
    opacity: 1;
  }
}

@keyframes slide-down-leave {
  from {
    top: 30px;
    opacity: 1;
  }
  to {
    top: 37px;
    opacity: 0;
  }
}
</style>