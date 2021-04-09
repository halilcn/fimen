<template>
  <div class="file_input">
    <label :for="id">
      <!-- <i class="fas fa-check-circle"></i>-->
      Dosya Seç
    </label>
    <input
        @change="selectFile"
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
    }
  },
  data() {
    return {
      file: ''
    }
  },
  methods: {
    selectFile(e) {
      var files = e.target.files || e.dataTransfer.files;
      if (!files.length)
        return;
      this.file(files[0]);
    }
  }
}
</script>

<style scoped>
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