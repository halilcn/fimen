<template>
  <div class="content">
    <bg-img-title
        image="applyMentor/top-bg.jpg"
        title="Mentor Başvurusu"/>
    <div class="title">
      Süreç Nasıl İşler ?
    </div>
    <ul class="steps">
      <li>
        <div class="number">
          <img src="../../assets/images/stepsNumber/1.png"/>
        </div>
        <div class="text">
          <div class="title">
            Gerekli Alanları Doldur
          </div>
          <div class="detail">
            Seni daha iyi tanımamız için eksiksiz doldurmalısın.
          </div>
        </div>
      </li>
      <li>
        <div class="text reverse_text">
          <div class="title">
            Profilini İnceleyelim
          </div>
          <div class="detail">
            Yetkinliğini onaylamak için profilini ve başvururken dolduruğun formu incelememiz gerekir.
          </div>
        </div>
        <div class="number">
          <img src="../../assets/images/stepsNumber/2.png"/>
        </div>
      </li>
      <li>
        <div class="number">
          <img src="../../assets/images/stepsNumber/3.png"/>
        </div>
        <div class="text">
          <div class="title">
            Artık Mentorluk Verebilirsin !
          </div>
          <div class="detail">
            Sende mentorluk programı başlatabilir ve mentorluk verebilirsin.
          </div>
        </div>
      </li>
    </ul>
    <template v-if="!$store.getters.isMentor">
      <form
          v-if="!$store.getters.hasMentorAppeal"
          id="mentorAppealForm">
        <ul class="form_ul">
          <li>
            <div class="title">
              Yetkinlik Alanınız
              <span class="required_icon">*</span>
            </div>
            <standart-selector
                v-model="$v.user.competency_id.$model"
                name="competency_id"
                :options="$store.state.mentor.competencies"/>
          </li>
          <li>
            <div class="title">
              Kaç Yıldır Kendi Alanınızda Uğraş Veriyorsunuz ?
              <span class="required_icon">*</span>
            </div>
            <standart-input
                type="text"
                name="year"
                v-model="$v.user.year.$model"/>
            <error-alert
                v-if="!$v.user.year.required && $v.user.year.$dirty"
                text="Bu alan zorunludur"/>
          </li>
          <li>
            <div class="title">
              Yetkinlik Alanınızı Destekleyen Belge/Belgeler
            </div>
            <standart-file-input
                id="mentor_form_file"
                name="file"
                v-model="$v.user.file.$model"/>
            <div class="info">
              <i class="bi bi-info-circle-fill"></i>
              Lütfen tek dosya halinde yükleyiniz.(maksimum 20mb)
            </div>
            <error-alert
                v-if="!$v.user.file.checkFileSize && $v.user.file.$dirty"
                text="Dosya boyutu maksimum 20mb olabilir"/>
          </li>
          <li>
            <div class="title">
              Linkedin Profil Linki
            </div>
            <standart-input
                type="text"
                name="linkedin"/>
          </li>
          <li>
            <div class="title">
              Eğer Çalışıyorsan,Çalıştığınız Şirket ve Pozisyon
            </div>
            <standart-input
                type="text"
                name="company_and_position"/>
          </li>
          <li>
            <div class="title">
              Ek Olarak Eklemek İstediklerin
            </div>
            <standart-textarea
                name="postscript"/>
          </li>
          <li>
            <standart-checkbox
                text="Yukarıdaki bilgilerin doğruluğunu onaylıyorum."
                id="mentor_form_confirmation"
                name="confirmation"
                v-model="$v.user.confirmation.$model"/>
            <error-alert
                v-if="!$v.user.confirmation.sameAs && $v.user.confirmation.$dirty"
                text="Lütfen bilgilerinizin doğruluğunu onaylayınız"/>
          </li>
          <li class="button_li">
            <standart-button
                :isDisable="$v.user.$invalid"
                @click.native="postMentorForm"/>
          </li>
        </ul>
      </form>
      <div
          v-else
          class="already_applied">
        <i class="fas fa-check-circle"></i>
        <span>
        Başvurunuz Alındı.
      </span>
      </div>
    </template>
    <div
        v-else
        class="already_mentor">
      <i class="bi bi-emoji-smile"></i>
      <span> zaten mentorsun</span>
    </div>
  </div>
</template>

<script>
import {required, integer, sameAs} from 'vuelidate/lib/validators';
import {customValidators} from "@/helpers/customValidators";

const checkFileSize = (file) => {
  if (file.size > 0) {
    return customValidators.checkFileSize(file.size, 20);
  }
  return true;
}

export default {
  name: "ApplyMentor",
  data() {
    return {
      user: {
        competency_id: '',
        year: '',
        file: '',
        confirmation: false
      }
    }
  },
  components: {
    BgImgTitle: () => import('@/components/pages/shared/BgImgTitle'),
    StandartSelector: () => import('@/components/pages/shared/elements/StandartSelector'),
    StandartInput: () => import('@/components/pages/shared/elements/StandartInput'),
    StandartButton: () => import('@/components/pages/shared/elements/StandartButton'),
    StandartFileInput: () => import('@/components/pages/shared/elements/StandartFileInput'),
    StandartTextarea: () => import('@/components/pages/shared/elements/StandartTextarea'),
    StandartCheckbox: () => import('@/components/pages/shared/elements/StandartCheckbox'),
    ErrorAlert: () => import('@/components/pages/shared/ErrorAlert')
  },
  methods: {
    postMentorForm() {
      const formData = new FormData(document.getElementById('mentorAppealForm'));
      this.$store.dispatch('postMentorAppeal', formData)
          .catch(() => {
            alert('Bir hata oluştu!');
          });
    },
    getCompetencies() {
      this.$store.dispatch('getCompetencies')
          .catch((err) => {
            alert(err);
          });
    }
  },
  created() {
    this.getCompetencies();
  },
  validations: {
    user: {
      competency_id: {
        required,
        integer
      },
      year: {
        required
      },
      file: {
        checkFileSize
      },
      confirmation: {
        required,
        sameAs: sameAs(() => true)
      }
    }
  }
}
</script>

<style scoped>
.content {
  display: flex;
  flex-direction: column;
}

.content > .title {
  font-family: 'Poppins', sans-serif;
  font-size: 30px;
  text-align: center;
  margin-top: 40px;
}

.content > .steps {
  list-style-type: none;
  padding: 0px;
  width: 70%;
  margin: auto;
}

.steps > li {
  display: flex;
  justify-content: flex-start;
  align-items: center;
  padding: 10px 15px;
  background-color: #f1f1f1;
  border: 1px solid #eaeaea;
  border-radius: 6px;
  margin: 25px 0px;
  transition: .3s;

  box-shadow: 0 0.5px 0.8px rgba(0, 0, 0, 0.011),
  0 1.1px 2px rgba(0, 0, 0, 0.016),
  0 2.1px 3.8px rgba(0, 0, 0, 0.02),
  0 3.8px 6.7px rgba(0, 0, 0, 0.024),
  0 7.1px 12.5px rgba(0, 0, 0, 0.029),
  0 17px 30px rgba(0, 0, 0, 0.04);
}

.steps > li:hover {
  transform: translateY(-4px);
}

.steps > li > .number {
  width: 15%;
}

.steps > li > .number > img {
  width: 100px;
  height: 100px;
}

.steps > li > .text {
  width: 85%;
  padding: 5px 25px;
  text-align: left;
}

.steps > li > .reverse_text {
  text-align: right;
}

.steps > li > .text > .title {
  font-family: 'Rubik', 'sans-serif';
  font-size: 20px;
}

.steps > li > .text > .detail {
  margin-top: 4px;
  font-family: 'Montserrat', 'sans-serif';
  font-size: 15px;
  color: #414141;
}

.content > form > .form_ul {
  padding: 7px 40px;
  list-style-type: none;
  width: 70%;
  border: 1px solid #dedede;
  border-radius: 5px;
  margin: auto;

  box-shadow: 0 0.2px 0.5px rgba(0, 0, 0, 0.006),
  0 0.6px 1.1px rgba(0, 0, 0, 0.008),
  0 1.1px 2.1px rgba(0, 0, 0, 0.01),
  0 2px 3.8px rgba(0, 0, 0, 0.012),
  0 3.8px 7.1px rgba(0, 0, 0, 0.014),
  0 9px 17px rgba(0, 0, 0, 0.02);
}

.form_ul > li {
  margin: 20px 0px;
}

.form_ul > li > .title {
  font-family: 'Poppins', sans-serif;
  font-weight: 400;
  font-size: 17px;
  margin-bottom: 4px;
  color: var(--navy-blue-text-color);
}

.form_ul > li > .title > .required_icon {
  color: #dd1212;
}

.form_ul > li > .info {
  font-family: 'Montserrat', 'sans-serif';
  font-size: 11px;
  color: #434343;
  margin-top: 5px;
}

.form_ul > .button_li {
  display: flex;
  justify-content: flex-end;
  margin-top: 40px;
}

.content .already_applied {
  display: flex;
  justify-content: center;
  align-items: center;
  color: #1b911b;
  font-family: 'Rubik', 'sans-serif';
  font-size: 32px;
  background-color: #e3ffe3;
  border: 1px solid #c8ffc8;
  padding: 20px 0px;
  margin: 40px 0px;
}

.content .already_applied > i {
  margin-right: 15px;
}

.content .already_mentor {
  display: flex;
  justify-content: center;
  align-content: center;
  padding: 15px 0;
  border-radius: 4px;
  font-family: 'Rubik', 'sans-serif';
  font-size: 22px;
  color: var(--navy-red-bg-dark-color);
  background-color: #ffebe8;;
}

.content .already_mentor > i {
  margin-right: 5px;
}

@media only screen and (max-width: 768px) {
  .content > .title {
    font-size: 25px;
    margin-top: 10px;
  }

  .content > .steps {
    width: 100%;
  }

  .steps > li {
    margin: 14px 0;
  }

  .steps > li > .number {
    width: 20%;
  }

  .steps > li > .number > img {
    width: 50px;
    height: 50px;
  }

  .steps > li > .text {
    width: 80%;
  }

  .steps > li > .text > .title {
    font-size: 16px;
  }

  .steps > li > .text > .detail {
    font-size: 13px;
    text-align: justify;
  }

  .content > form > .form_ul {
    width: 100%;
    padding: 5px 25px;
  }

  .form_ul > li > .title {
    font-size: 15px;
  }

  .form_ul > li > .info {
    font-size: 9px;
  }

  .content .already_applied {
    font-size: 20px;
  }

}

</style>