<template>
  <popup
      v-if="$store.state.isShowPopup"
      :popupHeight="popupHeight"
      :title="title">
    <ul slot="popup" class="new_mentor_program">
      <li>
        <div class="input_title">
          Mentee Sayısı
        </div>
        <small-input
            type="text"
            v-model.number.trim="$v.program.mentee_count.$model"/>
        <template v-if="$v.program.mentee_count.$error && $v.program.mentee_count.$dirty">
          <error-alert v-if="!$v.program.mentee_count.required" :text="$errors.required()"/>
          <error-alert v-if="!$v.program.mentee_count.minValue" :text="$errors.minValue('','1')"/>
          <error-alert v-if="!$v.program.mentee_count.numeric" :text="$errors.numeric()"/>
        </template>
      </li>
      <li>
        <div class="input_title">
          Program Başlığı
        </div>
        <small-input
            type="text"
            v-model.number.trim="$v.program.title.$model"/>
        <template v-if="$v.program.title.$error && $v.program.title.$dirty">
          <error-alert v-if="!$v.program.title.required" :text="$errors.required()"/>
        </template>
      </li>
      <li>
        <div class="input_title">
          Program Açıklaması
        </div>
        <small-textarea v-model="$v.program.explanation.$model"/>
        <template v-if="$v.program.explanation.$error && $v.program.explanation.$dirty">
          <error-alert v-if="!$v.program.explanation.required" :text="$errors.required()"/>
        </template>
      </li>
      <li>
        <div class="input_title">
          Son Başvuru Tarihi
        </div>
        <small-input
            type="datetime-local"
            v-model="$v.program.deadline.$model"/>
        <template v-if="$v.program.deadline.$error && $v.program.deadline.$dirty">
          <error-alert v-if="!$v.program.deadline.required" :text="$errors.required()"/>
          <error-alert v-if="!$v.program.deadline.minValue" :text="$errors.invalidDate()"/>
        </template>
      </li>
      <li class="questions">
        <div class="input_title">
          Soru Ekle
          <tooltip :text="'Programa başvuracak kişiler, bu soruları cevaplamadan başvuramazlar.'"/>
        </div>
        <ul>
          <li
              v-for="(question,index) in program.questions"
              :key="index">
            <input
                placeholder="Lütfen soru ekleyin..."
                type="text"
                v-model.trim="program.questions[index]">
            <div @click="deleteQuestion(index)" class="delete_question">
              <i class="bi bi-trash-fill"></i>
            </div>
            <!-- <template v-if="v.$dirty">
              <error-alert v-if="v.required" :text="$errors.required()"/>
            </template>-->
          </li>
        </ul>
        <div @click="addQuestion" class="add_question">
          <i class="bi bi-plus-circle-fill"></i>
          soru ekle
        </div>
      </li>
      <li>
        <standart-button
            @click.native="postMentorProgram"
            :text="'Program Oluştur'"
            :isDisable="$v.program.$invalid"
            :isLoading="isLoading"/>
      </li>
    </ul>
  </popup>
</template>

<script>
import {required, minValue, numeric} from 'vuelidate/lib/validators';
import moment from "moment";

export default {
  name: "NewProgramForm",
  props: ['popupHeight', 'title'],
  data() {
    return {
      program: {
        title: '',
        explanation: '',
        mentee_count: '',
        deadline: moment().add(1, 'day').format('YYYY-MM-DDTHH:mm'),
        questions: []
      },
      isLoading: false
    }
  },
  validations: {
    program: {
      title: {
        required
      },
      explanation: {
        required
      },
      deadline: {
        required,
        minValue: value => value > moment().add(1, 'day').toISOString()
      },
      mentee_count: {
        required,
        minValue: minValue(1),
        numeric
      },
      questions: {
        /*$each: {
          required
        }*/
      }
    }
  },
  components: {
    Popup: () => import('@/components/pages/shared/Popup'),
    SmallInput: () => import('@/components/pages/shared/elements/SmallInput'),
    SmallTextarea: () => import('@/components/pages/shared/elements/SmallTextarea'),
    Tooltip: () => import('@/components/pages/shared/Tooltip'),
    StandartButton: () => import('@/components/pages/shared/elements/StandartButton'),
    ErrorAlert: () => import('@/components/pages/shared/ErrorAlert'),
  },
  methods: {
    addQuestion() {
      this.program.questions.push('');
    },
    deleteQuestion(index) {
      this.program.questions.splice(index, 1);
    },
    postMentorProgram() {
      this.isLoading = true;
      this.$store.dispatch('postMentorProgram', {...this.program})
          .then(() => {
            this.program = this.$helper.clearItemsInObject(this.program);
          })
          .catch(() => {
            alert('Bir hata oluştu.');
          })
          .finally(() => {
            this.isLoading = false;
          });
    }
  },
}
</script>

<style scoped>
.new_mentor_program {
  padding: 0;
  list-style-type: none;
}

.new_mentor_program > li {
  margin: 20px 0;
  display: flex;
  flex-direction: column;
}

.new_mentor_program > li > .input_title {
  display: flex;
  align-items: center;
  font-family: 'Rubik', sans-serif;
  font-size: 15px;
  margin-bottom: 4px;
  color: var(--navy-blue-text-color);
}

.new_mentor_program > .questions {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
}

.questions > ul {
  list-style-type: none;
  padding: 0;
  width: 100%;
}

.questions > ul > li {
  display: flex;
  justify-content: flex-start;
  align-items: center;
  margin: 8px 0;
}

.questions > ul > li > input {
  width: 100%;
  padding: 8px 10px;
  border: 1px solid #dedede;
  border-radius: 4px;
  font-family: 'Poppins', sans-serif;
  font-size: 12px;
  color: #4a4a4a;
}

.questions > ul > li > input:focus {
  border-color: #c8c8c8;
}

.questions > ul > li > .delete_question {
  font-size: 17px;
  margin-left: 10px;
  padding: 6px 8px;
  border-radius: 100%;
  color: #d72222;
  cursor: pointer;
  transition: .1s;
}

.questions > ul > li > .delete_question:hover {
  background-color: #ffe6e6;
}

.questions > .add_question {
  font-family: 'Montserrat', sans-serif;
  font-size: 13px;
  margin-top: 5px;
  padding: 5px 10px;
  border: 1px solid #ffeae8;
  border-radius: 10px;
  background-color: #fff2f1;
  color: var(--navy-red-bg-dark-color);
  cursor: pointer;
}

.questions > .add_question:hover {
  background-color: #ffeeeb;
}

.new_mentor_program > li > .send_button {
  margin-left: auto;
  padding: 8px 15px;
  font-size: 12px;
}
</style>