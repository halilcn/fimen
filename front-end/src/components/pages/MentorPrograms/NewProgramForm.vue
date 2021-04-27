<template>
  <popup
      :popupHeight="popupHeight"
      :title="title">
    <ul slot="popup" class="new_mentor_program">
      <li>
        <div class="input_title">
          Mentee Sayısı
        </div>
        <standart-input/>
      </li>
      <li>
        <div class="input_title">
          Başlık
        </div>
        <standart-input/>
      </li>
      <li>
        <div class="input_title">
          Açıklama
        </div>
        <standart-textarea/>
      </li>
      <li>
        <div class="input_title">
          Son Tarih
        </div>
        <standart-input/>
      </li>
      <li class="questions">
        <div class="input_title">
          Soru Ekle
          <tooltip :text="'deneme yazısıdr bu'"/>
        </div>
        <ul>
          <li>
            <input type="text">
            <div class="delete_question">
              <i class="bi bi-trash-fill"></i>
            </div>
          </li>
        </ul>
        <div class="add_question">
          <i class="bi bi-plus-circle-fill"></i>
          soru ekle
        </div>
      </li>
    </ul>
  </popup>
</template>

<script>
export default {
  name: "NewProgramForm",
  props: ['popupHeight', 'title'],
  data() {
    return {}
  },
  components: {
    Popup: () => import('@/components/pages/shared/Popup'),
    StandartInput: () => import('@/components/pages/shared/elements/StandartInput'),
    StandartTextarea: () => import('@/components/pages/shared/elements/StandartTextarea'),
    Tooltip: () => import('@/components/pages/shared/Tooltip'),
  }
}
</script>

<style scoped>
.new_mentor_program {
  padding: 0;
  list-style-type: none;
}

.new_mentor_program > li {
  margin: 20px 0;
}

.new_mentor_program > li > .input_title {
  display: flex;
  align-items: center;
  font-family: 'Rubik', sans-serif;
  font-size: 17px;
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
.questions > .add_question:hover{
  background-color: #ffeeeb;
}
</style>