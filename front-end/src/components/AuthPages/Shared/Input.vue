<template>
  <div class="input_container">
    <input
        :placeholder="placeholder"
        :type="type"
        :name="name"
        :value="value">
  </div>
</template>

<script>
export default {
  name: "AuthInput",
  props: {
    placeholder: {
      required: true
    },
    type: {
      required: true
    },
    name: {
      required: true
    },
    value: {
      default: ''
    }
  }
}
</script>

<style scoped>
.input_container {
  width: 100%;
  margin: 17px 0px;
}

.input_container > input {
  width: 100%;
  padding: 10px 15px;
  border: 1px solid #d6d6d6;
  border-radius: 3px;
  font-family: 'Poppins', sans-serif;
  font-size: 14px;
  color: #4c4c4c;
  transition: .3s;
}

.input_container > input:hover {
  border-color: #c1d2ff;
}

.input_container > input:focus {
  border-color: #c1d2ff;
  -webkit-box-shadow: 0px 0px 0px 1px rgba(232, 239, 255, 1);
  -moz-box-shadow: 0px 0px 0px 1px rgba(232, 239, 255, 1);
  box-shadow: 0px 0px 0px 1px rgba(232, 239, 255, 1);
}
</style>
