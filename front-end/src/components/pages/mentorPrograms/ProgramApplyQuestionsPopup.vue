<template>
  <popup
      title="Mentor Programı Başvurusu Soruları"
      :width="40">
    <template slot="popup">
      <ul class="questions">
        <li
            v-for="(question,index) in questions"
            :key="index">
          <div class="question">
            {{ question }}
          </div>
          <small-input
              type="text"
              v-model="answers[index]"/>
        </li>
        <error-alert
            v-if="false /*$error*/"
            text="Tüm sorular cevaplanmalıdır."/>
        <li class="send_button">
          <standart-button
              :isDisable="false /*$v.$invalid*/"
              @click.native="$emit('postProgramApply')"
              text="Gönder ve Başvur"/>
        </li>
      </ul>
    </template>
  </popup>
</template>

<script>
import {required} from 'vuelidate/lib/validators'

export default {
  name: "ProgramApplyQuestionsPopup",
  props: {
    questions: {
      type: Array,
      defaults: [],
    },
    answers: {
      type: Array,
      defaults: []
    }
  },
  validations: {
    answers: {
      $each: {
        required
      }
    }
  },
  components: {
    Popup: () => import('@/components/pages/shared/Popup'),
    SmallInput: () => import('@/components/pages/shared/elements/SmallInput'),
    StandartButton: () => import('@/components/pages/shared/elements/StandartButton'),
    ErrorAlert: () => import('@/components/pages/shared/ErrorAlert'),
  },

}
</script>

<style scoped>
.questions {
  list-style-type: none;
  padding: 0;
}

.questions > li {
  margin: 12px 0;
}

.questions > li > .question {
  font-family: 'Rubik', sans-serif;
  font-weight: 400;
  margin-bottom: 5px;
  color: var(--navy-blue-text-color);
}

.questions > li.send_button {
  margin-top: 20px;
}

</style>