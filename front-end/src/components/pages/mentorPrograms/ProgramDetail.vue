<template>
  <div class="mentor_program_container">
    <div class="mentor_program">
      <div class="title">
        title title title title title title title title title
      </div>
      <div class="details">
        <div>
          <i class="bi bi-people"></i>
          15 kişi
        </div>
        <div>
          <i class="bi bi-clock"></i>
          27 Temmuz 2021
        </div>
      </div>
      <div class="text">
        yazı adso aıdsoapsdıaos dkaosdja dakj klsdjasdjaksd asd adsaasdada das yazı adso aıdsoapsdıaos dkaosdja dakj
        klsdjasdjaksd asd adsaasdada das yazı adso aıdsoapsdıaos dkaosdja dakj klsdjasdjaksd asd adsaasdada das yazı
        adso aıdsoapsdıaos dkaosdja dakj klsdjasdjaksd asd adsaasdada das yazı adso aıdsoapsdıaos dkaosdja dakj
        klsdjasdjaksd asd adsaasdada das yazı adso aıdsoapsdıaos dkaosdja dakj klsdjasdjaksd asd adsaasdada das yazı
        adso aıdsoapsdıaos dkaosdja dakj klsdjasdjaksd asd adsaasdada das yazı adso aıdsoapsdıaos dkaosdja dakj
        klsdjasdjaksd asd adsaasdada das yazı adso aıdsoapsdıaos dkaosdja dakj klsdjasdjaksd asd adsaasdada das
      </div>
    </div>
    <div class="others">
      <div class="mentor">
        <div class="info">
          <img src="https://ui-avatars.com/api/?name=halil+can&amp;background=0288D0&amp;color=fff&amp;size=128">
          <div class="text_info">
            <div class="name">
              Halil CAN
            </div>
            <div class="username">
              @hcan
            </div>
          </div>
        </div>
        <div class="competency_name">
          <i class="bi bi-list"></i>
          Yazılım
        </div>
        <div class="go_profile">
          Profile Git
        </div>
      </div>
      <div class="apply_program">
        <div class="question_info has_question">
          Bu program cevaplamak için 3 tane soru cevaplanması gerekiyor.

        </div>
        <div class="applt_buttton">
          Programa Başvur
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "ProgramsDetail",
  data() {
    return {}
  },
  components: {}
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
  text-align: left;
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
  margin-top: 7px;
  font-family: 'Poppins', sans-serif;
}

.mentor > .go_profile {
  padding: 8px 0;
  text-align: center;
  background-color: var(--navy-blue-bg-color);
  color: white;
  margin-top: 10px;
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

.others > .apply_program {

}

.apply_program > .question_info {

}

.apply_program > .question_info.has_question {

}

.apply_program > .question_info.not_question {

}
</style>