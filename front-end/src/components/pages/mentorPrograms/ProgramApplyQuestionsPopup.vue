<template>
  <popup
      title="Soruları"
      :width="40">
    <template slot="popup">
      <ul class="questions">
        <li
            v-for="(question,index) in questions"
            :key="index">
          <div class="question">
            {{ question }}
          </div>
          <small-input/>
        </li>
        <li class="send_button">
          <standart-button text="Gönder ve Başvur"/>
        </li>
      </ul>
    </template>
  </popup>
</template>

<script>
export default {
  name: "ProgramApplyQuestionsPopup",
  props: {
    questions: {
      type: Array,
      defaults: [],
    }
  },
  components: {
    Popup: () => import('@/components/pages/shared/Popup'),
    SmallInput: () => import('@/components/pages/shared/elements/SmallInput'),
    StandartButton: () => import('@/components/pages/shared/elements/StandartButton'),
  }
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