<template>
  <ul class="active_program_others">
    <confirmation-popup
        v-if="isShowDeleteMentorMenteeProgramContinuePopup"
        text="Program Sonlandırılmak Üzere"
        @cancelClick="actionDeleteMentorMenteeProgramContinuePopup"
        @confirmationClick="destroyMentorMenteeProgram"/>
    <template>
      <template v-if="isMentor">
        <li class="item">
          <div class="title">
            Mentor Programını Sonlandırma
          </div>
          <div class="content">
            <div @click="actionDeleteMentorMenteeProgramContinuePopup" class="delete_program_btn">
              Programı Sonlandır
            </div>
          </div>
        </li>
      </template>
      <template v-else>
        mentee olanlar görebilecek seçenekler
      </template>
    </template>
  </ul>
</template>

<script>
import {mapState} from 'vuex'

export default {
  name: "OthersComponent",
  data() {
    return {
      isShowDeleteMentorMenteeProgramContinuePopup: false
    }
  },
  components: {
    ConfirmationPopup: () => import('@/components/pages/shared/ConfirmationPopup')
  },
  methods: {
    actionDeleteMentorMenteeProgramContinuePopup() {
      this.isShowDeleteMentorMenteeProgramContinuePopup = !this.isShowDeleteMentorMenteeProgramContinuePopup
    },
    destroyMentorMenteeProgram() {
      this.$store.dispatch('destroyMentorMenteeProgram')
          .then(() => {
            this.$router.push({name: 'MeActivePrograms'});
          })
          .catch(() => {
            alert('Bir hata oluştu!');
          });
    }
  },
  computed: {
    ...mapState({
      'isMentor': state => state.mentorMenteeProgram.isMentor
    })
  }
}
</script>

<style scoped>
.active_program_others {
  padding: 0;
  list-style-type: none;
}

.active_program_others > .item {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.active_program_others > .item > .title {
  font-family: 'Poppins', sans-serif;
  font-size: 14px;
}

.active_program_others > .item > .content {

}

.active_program_others > .item > .content > .delete_program_btn {
  font-family: 'Poppins', sans-serif;
  font-size: 13px;
  cursor: pointer;
  padding: 5px 10px;
  border-radius: 4px;
  color: var(--navy-red-text-color);
  background-color: #fff0f0;
}

.active_program_others > .item > .content > .delete_program_btn:hover {
  background-color: #ffebeb;
}
</style>