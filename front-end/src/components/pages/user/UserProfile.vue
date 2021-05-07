<template>
  <bg-white-template>
    <template slot="content">
      <div class="user_container">
        <div class="user">
          <div class="image">
            <img src="https://ui-avatars.com/api/?name=halil+can&amp;background=0288D0&amp;color=fff&amp;size=128">
          </div>
          <div class="infos">
            <div class="name_surname">
              Halil CAN
            </div>
            <div class="username">
              @halilcan
            </div>
            <div class="role">
              Mentee & Mentor
            </div>
            <div class="cv">
              CV İncele
            </div>
          </div>
          <div class="add_favorite_button">
            <i class="bi bi-star"></i>
          </div>
        </div>
        <part title="denene denen">
          <template slot="content">
            içerik içerik içerik
          </template>
        </part>
      </div>
    </template>
  </bg-white-template>
</template>

<script>
export default {
  name: "UserProfile",
  components: {
    BgWhiteTemplate: () => import('@/components/pages/shared/BgWhiteTemplate'),
    Part: () => import('@/components/pages/user/shared/Part')
  }
}
</script>

<style scoped>
.user {
  display: flex;
  justify-content: flex-start;
}

.user > .image {
}

.user > .image > img {
  border-radius: var(--navy-user-profile-border-radius);
  width: 160px;
}

.user > .infos {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  justify-content: flex-start;
  margin-left: 40px;
}

.user > .infos > .name_surname {
  font-family: 'Poppins', sans-serif;
  font-weight: 400;
  font-size: 25px;
}

.user > .infos > .username {
  font-family: 'Montserrat', sans-serif;
  font-size: 16px;
}

.user > .infos > .role {
  font-family: 'Montserrat', 'sans-serif';
  color: var(--navy-mentor-mentee-text-color);
}

.user > .infos > .cv {
  background-color: var(--navy-red-bg-color);
  color: white;
  font-family: 'Poppins', sans-serif;
  font-size: 14px;
  padding: 5px 20px;
  border-radius: 3px;
  cursor: pointer;
  margin-top: auto;
}

.user > .add_favorite_button {
  margin-left: auto;
  align-self: flex-start;
  padding: 6px 8px;
  border: 1px solid black;
  border-radius: 5px;
  cursor: pointer;
}

.user_container {
  padding: 5px 40px;
}
</style>