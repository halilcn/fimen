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
      <li class="add_question">
        <div class="input_title">
          <tooltip/>
          Soru Ekle
        </div>
        <ul>

        </ul>
      </li>
    </ul>
  </popup>
</template>

<script>

export default {
  name: "NewProgramForm",
  props: ['popupHeight', 'title'],
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
  font-family: 'Rubik', sans-serif;
  font-size: 17px;
  margin-bottom: 4px;
  color: var(--navy-blue-text-color);
}
</style>