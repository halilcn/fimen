<template>
  <popup title="Yeni Toplantı(Google Meeting)">
    <template slot="popup">
      <div class="meet">
        <div class="item">
          <div class="title">
            Meet Adresi
          </div>
          <div class="content meeting_address">
            <small-input
                v-model.trim="$v.meet.address.$model"
                type="text"/>
            <a href="http://meet.google.com/new" target="_blank" class="create_meeting_address">
              Yeni Meet Adresi Oluştur
            </a>
          </div>
        </div>
        <div class="item">
          <div class="title">
            Toplantı Açıklaması
          </div>
          <div class="content meeting_address">
            <small-textarea
                v-model.trim="$v.meet.explanation.$model"/>
          </div>
        </div>
        <div class="item">
          <div class="title">
            Toplantı Tarihi
          </div>
          <div class="content meeting_address">
            <small-input
                type="datetime-local"
                v-model.trim="$v.meet.date.$model"/>
          </div>
        </div>
        <standart-button
            class="send_meet"
            @click.native="postMentorMenteeProgramMeeting"
            text="Oluştur"
            :isDisable="$v.meet.$invalid"
            :isLoading="isLoading"/>
      </div>
    </template>
  </popup>
</template>

<script>

import {required} from 'vuelidate/lib/validators'

export default {
  name: "NewMeeting",
  data() {
    return {
      meet: {
        address: '',
        explanation: '',
        date: ''
      },
      isLoading: false
    }
  },
  components: {
    Popup: () => import('@/components/pages/shared/Popup'),
    SmallInput: () => import('@/components/pages/shared/elements/SmallInput'),
    SmallTextarea: () => import('@/components/pages/shared/elements/SmallTextarea'),
    StandartButton: () => import('@/components/pages/shared/elements/StandartButton'),
  },
  validations: {
    meet: {
      address: {
        required
      },
      explanation: {
        required
      },
      date: {
        required,
      }
    }
  },
  methods: {
    postMentorMenteeProgramMeeting() {
      this.isLoading = true;
      this.$store.dispatch('postMentorMenteeProgramMeeting', this.meet)
          .then(() => {
            this.isLoading = false;
            this.$store.commit('setShowPopup', false)
            //tüm objeyi temizle !!
          });
    }
  }
}
</script>

<style scoped>
.meet {

}

.meet > .item {
  margin: 8px 0;
}

.meet > .item > .title {
  font-family: 'Poppins', sans-serif;
  font-size: 15px;
  margin-bottom: 2px;
}

.meet > .item > .content {
  display: flex;
  align-items: center;
}

.meet > .item > .content > input {
  width: 60%;
}

.meet > .item > .content.meeting_address > .create_meeting_address {
  font-family: 'Poppins', sans-serif;
  font-size: 12px;
  cursor: pointer;
  background-color: #f6f6f6;
  color: black;
  border-radius: 4px;
  padding: 7px;
  margin-left: 8px;
  text-decoration: none;
}

.meet > .item > .content.meeting_address > .create_meeting_address:hover {
  background-color: #efefef;
}

.meet > .send_meet {
  margin-top: 20px;
}
</style>