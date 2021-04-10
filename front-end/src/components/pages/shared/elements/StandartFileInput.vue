<template>
  <div class="file_input">
    <label
        :class="{'selected':selectedFile}"
        :for="id">
      <span v-if="selectedFile">
      <i class="fas fa-check-circle"></i>
       Dosya Seçildi
      </span>
      <span v-else>
      Dosya Seç
      </span>
    </label>
    <input
        @change="uploadImage"
        :id="id"
        type="file">
  </div>
</template>

<script>
export default {
  name: "StandartFileInput",
  props: {
    text: {},
    id: {
      required: true,
      type: String
    },
    value: {
      required: true
    }
  },
  data() {
    return {
      file: '',
      selectedFile: false
    }
  },
  methods: {
    uploadImage(event) {
      this.file = event.target.files[0];
      this.selectedFile = true;
      this.$emit('input', this.file);
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

.file_input {
  padding: 8px 0px;
}

.file_input input {
  display: none;
}

.file_input > label {
  padding: 8px 20px;
  background-color: #d9d9d9;
  color: var(--navy-blue-text-light-color);
  font-family: 'Poppins', sans-serif;
  font-size: 14px;
  cursor: pointer;
  border-radius: 3px;
}

.file_input > label:not(.selected):hover {
  background-color: #d1d1d1;
}

.file_input > .selected {
  background-color: #199419;
  color: white;
}
</style>