<template>
  <div class="selector">
    <div @click="isEnableDropdown=!isEnableDropdown" class="selected_option">
      {{ selectedValue }}
      <i class="bi bi-caret-down-fill"></i>
    </div>
    <div v-show="isEnableDropdown" class="dropdown">
      <div
          v-for="(option,index) in options"
          :key="index"
          @click="select(option)"
          class="option">
        {{ option.name }}
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "StandartSelector",
  props: {
    value: {
      default: ''
    },
    options: {
      required: true,
      type: Object
    }
  },
  data() {
    return {
      isEnableDropdown: false,
      selectedValue: 'Lütfe bir seçenek seçiniz'
    }
  },
  methods: {
    select(option) {
      this.inputValue = option.id;
      this.selectedValue = option.name;
      this.isEnableDropdown = false;
    }
  },
  computed: {
    inputValue: {
      get() {
        return this.value;
      },
      set(value) {
        this.$emit('input', value);
      }
    }
  }
}
</script>

<style scoped>

.selector {
  position: relative;
  border: 1px solid #dbdbdb;
  border-radius: 3px;
  cursor: pointer;
  font-family: 'Poppins', sans-serif;
  font-size: 14px;
}

.selector > .selected_option {
  display: flex;
  background-color: white;
  padding: 8px 15px;
  color: var(--navy-blue-text-light-color);
  border-radius: 3px;
}

.selector > .selected_option > i {
  margin-left: auto;
}

.selector > .dropdown {
  font-family: 'Montserrat', 'sans-serif';
  font-size: 13px;
  background-color: white;
  border: 1px solid #eaeaea;
  border-radius: 4px;
  position: absolute;
  width: 100%;
  top: 40px;
  max-height: 180px;
  overflow-x: hidden;
  overflow-y: auto;

  box-shadow: 0 0px 0.4px rgba(0, 0, 0, 0.028),
  0 0px 0.9px rgba(0, 0, 0, 0.04),
  0 0px 1.8px rgba(0, 0, 0, 0.05),
  0 0px 3.1px rgba(0, 0, 0, 0.06),
  0 0px 5.8px rgba(0, 0, 0, 0.072),
  0 0px 14px rgba(0, 0, 0, 0.1);
}

.selector > .dropdown > .option {
  padding: 8px 15px;
  background-color: white;
}

.selector > .dropdown > .option:hover {
  background-color: #f8f8f8;
}
</style>