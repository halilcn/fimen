<template>
  <div class="mentor_program_container">
    <questions-popup
        @postProgramApply="postProgramApply"
        :questions="program.questions"
        :answers="programAppeal.answers"/>
    <div class="mentor_program">
      <div class="title">
        {{ program.title }}
      </div>
      <div class="details">
        <div>
          <i class="bi bi-people"></i>
          {{ program.mentee_count }} kişi
        </div>
        <div>
          <i class="bi bi-clock"></i>
          {{ moment(program.deadline).format('LLL') }}
        </div>
      </div>
      <div class="text">
        {{ program.explanation }}
      </div>
    </div>
    <div class="others">
      <div class="mentor">
        <div class="info">
          <img :src="program.user.image">
          <div class="text_info">
            <div class="name">
              {{ program.user.name }}
            </div>
            <div class="username">
              @{{ program.user.username }}
            </div>
          </div>
        </div>
        <div class="competency_name">
          {{ program.user.competency_name }}
        </div>
        <router-link
            tag="div"
            :to="{name:'UserProfile',params:{username:program.user.username}}"
            class="go_profile">
          Profile Git
        </router-link>
      </div>
      <div v-if="program.is_applied" class="has_apply_program">
        <i class="fas fa-check-circle"></i>
        Zaten Başvurdun
      </div>
      <div v-else class="apply_program">
        <div v-if="program.questions.length > 0" class="question_info has_question">
          Bu programa başvurmak için {{ program.questions.length }} tane soru cevaplanması gerekiyor.
        </div>
        <div v-else class="question_info not_question">
          Bu programa soru cevaplamadan başvurulabilir.
        </div>
        <div class="apply_button">
          <standart-button
              @click.native="applyProgram"
              text="Başvur"
              :isDisable="false"/>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

export default {
  name: "ProgramsDetail",
  data() {
    return {
      program: {},
      programAppeal: {
        program_id: 758132,
        answers: []
      }
    }
  },
  components: {
    StandartButton: () => import('@/components/pages/shared/elements/StandartButton'),
    QuestionsPopup: () => import('@/components/pages/mentorPrograms/ProgramApplyQuestionsPopup'),
  },
  created() {
    this.$store.dispatch('getMentorProgramDetails')
        .then(res => {
          console.log(res);
          this.program = res;
          //************************
          // eslint-disable-next-line no-unused-vars
          for (var index in res.questions) {
            this.answers.push('');
          }
          console.log(this.answers);
        })
  },
  methods: {
    applyProgram() {
      if (this.program.questions.length > 0) {
        this.$store.commit('setShowPopup', true);
        return 0;
      }
      this.postProgramApply();
    },
    postProgramApply() {
      this.$store.dispatch('postProgramApply', this.programAppeal)
          .then(() => {
            this.program.is_applied = true;
            this.$store.commit('setShowPopup',false);
          })
    }
  }
}
</script>

<style scoped>
.mentor_program_container {
  display: flex;
}

.mentor_program {
  width: 65%;
  padding: 17px;
}

.mentor_program > .title {
  font-family: 'Poppins', sans-serif;
  font-weight: 500;
  font-size: 26px;
  color: var(--navy-blue-text-color);
}

.mentor_program > .details {
  display: flex;
  margin-top: 10px;
}

.mentor_program > .details > div {
  font-family: 'Montserrat', sans-serif;
  font-size: 12px;
  margin-right: 15px;
  background-color: #f3f3f3;
  padding: 3px 10px;
  border-radius: 10px;
}

.mentor_program > .text {
  font-family: 'Montserrat', sans-serif;
  font-size: 14px;
  margin-top: 20px;
  color: #454545;
  letter-spacing: 1px;
  line-height: 1.6;
  text-align: justify;
}

.others {
  width: 35%;
  display: flex;
  flex-direction: column;
  padding: 17px;
}

.others > div {
  padding: 15px;
  border: 1px solid #e7e7e7;
  border-radius: 10px;
  box-shadow: 0 0px 0.5px rgba(0, 0, 0, 0.017),
  0 0px 1.3px rgba(0, 0, 0, 0.024),
  0 0px 2.4px rgba(0, 0, 0, 0.03),
  0 0px 4.2px rgba(0, 0, 0, 0.036),
  0 0px 7.9px rgba(0, 0, 0, 0.043),
  0 0px 19px rgba(0, 0, 0, 0.06);
}

.others > .mentor {
}

.mentor > .info {
  display: flex;
}

.mentor > .info > img {
  width: 75px;
  border-radius: var(--navy-user-profile-border-radius);
}

.mentor > .info > .text_info {
  display: flex;
  flex-direction: column;
  justify-content: center;
  margin-left: 10px;
}

.mentor > .info > .text_info > .name {
  font-family: 'Poppins', sans-serif;
  font-weight: 400;
  font-size: 19px;
}

.mentor > .info > .text_info > .username {
  font-family: 'Montserrat', sans-serif;
  font-size: 15px;
}

.mentor > .competency_name {
  margin-top: 10px;
  font-family: 'Poppins', sans-serif;
  font-size: 15px;
  background-color: #ecf4ff;
  color: var(--navy-mentor-mentee-text-color);
  display: inline-block;
  padding: 3px 20px;
  border-radius: 4px;
}

.mentor > .go_profile {
  padding: 10px 0;
  text-align: center;
  background-color: var(--navy-blue-bg-color);
  color: white;
  margin-top: 15px;
  cursor: pointer;
  border-radius: 7px;
  font-family: 'Poppins', sans-serif;
  font-weight: 500;
  font-size: 14px;
  transition: .2s;
}

.mentor > .go_profile:hover {
  background-color: var(--navy-blue-bg-hover-color);
}

.others > .has_apply_program {
  margin-top: 30px;
  position: sticky;
  top: 30px;
  text-align: center;
  color: #1d911d;
  background-color: #e8ffe8;
  font-family: 'Montserrat', sans-serif;
}

.others > .apply_program {
  margin-top: 30px;
  position: sticky;
  top: 30px;
}

.apply_program > .question_info {
  font-family: 'Montserrat', sans-serif;
  font-size: 14px;
}

.apply_program > .question_info.has_question {
  color: var(--navy-blue-text-color);
}

.apply_program > .question_info.not_question {
  color: #4e4e4e;
}

.apply_program > .apply_button {
  margin-top: 15px;
}

@media only screen and (max-width: 768px) {
  .mentor_program_container {
    flex-direction: column;
  }

  .mentor_program {
    width: 100%;
    padding: 0;
  }

  .mentor_program > .title {
    font-size: 20px;
  }

  .mentor_program > .details > div {
    font-size: 11px;
    margin-right: 10px;
    padding: 2px 7px;
  }

  .mentor_program > .text {
    font-size: 12px;
    margin-top: 15px;
    letter-spacing: 0;
    line-height: 1.6;
    text-align: left;
  }

  .others {
    width: 100%;
    padding: 0;
    margin-top: 40px;
  }

  .others > div {
    padding: 10px;
  }

  .others > .mentor {
    position: relative;
  }

  .mentor > .info {
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  .mentor > .info > img {
    width: 50px;
  }

  .mentor > .info > .text_info {
    margin-left: 0;
    margin-top: 5px;
    align-items: center;
  }

  .mentor > .info > .text_info > .name {
    font-size: 15px;
    text-align: center;
  }

  .mentor > .info > .text_info > .username {
    font-size: 12px;
  }

  .mentor > .competency_name {
    margin-top: 0;
    font-size: 13px;
    position: absolute;
    top: 10px;
    right: 10px;
  }

}
</style>