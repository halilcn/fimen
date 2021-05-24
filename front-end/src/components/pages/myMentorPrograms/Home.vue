<template>
  <div class="my_mentor_programs_container">
    <standart-title text="Mentor Programlarım"/>
    <div class="my_mentor_programs_list">
      <div
          v-for="(program,index) in myPrograms"
          :key="index"
          class="item">
        <div class="row">
          <router-link
              tag="div"
              :to="program.slug"
              class="title">
            {{ program.title }}
          </router-link>
          <div class="actions">
            <div class="edit_btn">
              <i class="bi bi-pencil-square"></i>
              düzenle
            </div>
            <div
                @click="postDestroyMeMentorProgram(program.id)"
                class="delete_btn">
              <i class="bi bi-trash"></i>
              sil
            </div>
          </div>
        </div>
        <div class="other-data">
          <div class="title">
            Belirlenmiş Parametereler:
          </div>
          <div class="list">
            <div>
              {{ program.mentee_count }} Mentee
            </div>
            <div>
              {{ moment(program.deadline).format('LLL') }}
            </div>
          </div>
        </div>
        <div class="other-data">
          <div class="title">
            Şuanki Durum:
          </div>
          <div class="list">
            <div>
              {{ program.appeal_count }} Başvuru
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import {mapState} from 'vuex'
import {mapActions} from 'vuex'

export default {
  name: "Home",
  components: {
    StandartTitle: () => import('@/components/pages/shared/Title')
  },
  methods: {
    ...mapActions({
      postDestroyMeMentorProgram: 'postDestroyMeMentorProgram',
    })
  },
  computed: {
    ...mapState({
      myPrograms: state => state.meMentorProgram.programs,
    }),
  },
  beforeCreate() {
    //???
    this.$store.dispatch('getMeMentorPrograms');
  }
}
</script>

<style scoped>
.my_mentor_programs_container {

}

.my_mentor_programs_list {
}

.my_mentor_programs_list > .item {
  margin: 20px 0;
  background-color: white;
  padding: 10px;
  border-radius: 5px;
  border: 1px solid #ececec;
}

.item > .row {
  display: flex;
  justify-content: space-between;
}

.item > .row > .title {
  font-family: 'Poppins', sans-serif;
  font-weight: 500;
  font-size: 17px;
  color: var(--navy-blue-text-color);
  cursor: pointer;
}

.item > .row > .title:hover {
  text-decoration: underline;
}

.item > .row > .actions {
  display: flex;
  align-items: center;
}

.item > .row > .actions > div {
  margin: 0 10px;
  cursor: pointer;
  font-family: 'Montserrat', sans-serif;
  font-size: 14px;
  border-radius: 4px;
  padding: 3px 7px;
}

.item > .row > .actions > .edit_btn {
  background-color: #f5f5f5;
  color: #323232;
}

.item > .row > .actions > .edit_btn:hover {
  background-color: #eeeeee;
}

.item > .row > .actions > .delete_btn {
  color: #ca2e2e;
  background-color: #fff5f5;
}

.item > .row > .actions > .delete_btn:hover {
  background-color: #ffeded;
}


.item > .other-data {
  display: flex;
  align-items: center;
  margin: 12px 0;
}

.item > .other-data > .title {
  font-family: 'Poppins', sans-serif;
  font-weight: 300;
  font-size: 14px;
  margin-right: 10px;
  color: #4a4a4a;
  width: 30%;
}

.item > .other-data > .list {
  display: flex;
  width: 70%;
}

.item > .other-data > .list > div {
  margin: 0 10px;
  font-family: 'Montserrat', sans-serif;
  font-size: 14px;
  color: var(--navy-red-txt-color);
  background-color: #fff2f1;
  padding: 3px 7px;
  border-radius: 4px;
}
</style>