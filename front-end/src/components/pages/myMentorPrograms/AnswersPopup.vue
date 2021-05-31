<template>
  <popup title="Soru Cevapları">
    <template slot="popup">
      <div class="answer_popup_content">
        <div class="item">
          <div class="question">
            <i class="fas fa-question-circle"></i>
            Soru soru soru 2
          </div>
          <div class="answer">
            Cevabım b benim
          </div>
        </div>
        <div class="item">
          <div class="question">
            <i class="fas fa-question-circle"></i>
            Soru soru soru 2
          </div>
          <div class="answer">
            Cevabım b benim
          </div>
        </div>
      </div>
    </template>
  </popup>
</template>

<script>
export default {
  name: "AnswersPopup",
  props: {
    questions: {
      required: true,
      type: Array
    },
    userId: {
      required: true
    }
  },
  components: {
    Popup: () => import('@/components/pages/shared/Popup')
  },
  methods: {
    getMentorProgramAnswers() {
      this.$store.dispatch('getMeMentorProgramAnswers', this.userId)
          .then(res => {
            console.log(res);
          })
    }
  },
  watch: {
    userId() {
      this.getMentorProgramAnswers();
    }
  }
}
</script>

<style scoped>
.answer_popup_content {
  display: flex;
  flex-direction: column;
}

.answer_popup_content > .item {
  margin: 10px 0;
}

.item > .question {
  font-family: 'Poppins', sans-serif;
  font-weight: 400;
  font-size: 16px;
  color: var(--navy-blue-text-color);
}

.item > .answer {
  font-family: 'Poppins', sans-serif;
  font-weight: 300;
  font-size: 14px;
}
</style>