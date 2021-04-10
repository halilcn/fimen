<template>
  <div class="selector">
    <div @click="isEnableDropdown=!isEnableDropdown" class="selected_option">
      Seçili Değer
      {{ inputValue }}
      <i class="bi bi-caret-down-fill"></i>
    </div>
    <div v-show="isEnableDropdown" class="dropdown">
      <div
          v-for="(option,index) in options"
          :key="index"
          @click="setValue(option.key)" class="option">
        {{ option.text }}
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
      type: Array
    }
  },
  data() {
    return {
      isEnableDropdown: false
    }
  },
  methods: {
    setValue(key) {
      this.inputValue = key;
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
}

.selector > .dropdown > .option {
  padding: 8px 15px;
  background-color: white;
}

.selector > .dropdown > .option:hover {
  background-color: #f8f8f8;
}
</style>