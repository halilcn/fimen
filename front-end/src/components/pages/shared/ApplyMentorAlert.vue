<template>
  <div v-if="$store.state.showMentorAppealAlert" class="alert">
    <div class="title">
      <i @click="setShowMentorAppeal(false)" class="bi bi-x-circle"></i>
    </div>
    <div class="content">
      <div class="text">
        Mentor mu olmak istiyorsun ?
      </div>
      <router-link
          @click.native="setShowMentorAppeal(false)"
          to="/mentor-basvuru"
          tag="div"
          class="button">
        <standart-button
            :isDisable="false"
            text="Hemen Başvur"/>
      </router-link>
    </div>
  </div>
</template>

<script>
import {mapMutations} from 'vuex'

export default {
  name: "ApplyMentorAlert",
  components: {
    StandartButton: () => import('@/components/pages/shared/elements/StandartButton')
  },
  methods: {
    ...mapMutations(['setShowMentorAppeal'])
  }
}
</script>

<style scoped>
.alert {
  position: fixed;
  bottom: 60px;
  right: 60px;
  padding: 10px 18px;
  border-radius: 5px;
  background-color: white;

  box-shadow: 0 0.4px 0.3px rgba(0, 0, 0, 0.014),
  0 1.1px 0.7px rgba(0, 0, 0, 0.02),
  0 2px 1.3px rgba(0, 0, 0, 0.025),
  0 3.6px 2.2px rgba(0, 0, 0, 0.03),
  0 6.7px 4.2px rgba(0, 0, 0, 0.036),
  0 16px 10px rgba(0, 0, 0, 0.05);

}

.alert > .title {
  text-align: right;
}

.alert > .title > i {
  cursor: pointer;
  font-size: 18px;
}

.alert > .title > i:hover {
  color: #4f4f4f;
}

.alert > .content > .text {
  font-family: 'Montserrat', sans-serif;
  margin: 20px 0;
}
</style>