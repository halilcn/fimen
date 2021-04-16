<template>
  <input
      :type="type"
      :name="name"
      :placeholder="placeholder"
      v-model="inputValue">
</template>

<script>
export default {
  name: "StandartInput",
  props: {
    type: {
      required: true,
      type: String
    },
    name: {
      required: false,
      default: '',
      type: String
    },
    placeholder: {
      required: false,
      default: ''
    },
    value: {
      required: false
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
input {
  width: 100%;
  border: 1px solid #dbdbdb;
  border-radius: 3px;
  padding: 8px 20px;
  color: var(--navy-blue-text-light-color);
  font-family: 'Poppins', sans-serif;
  font-size: 14px;
  transition: .3s;
}

input:focus, input:hover {
  border-color: #cccccc;
  box-shadow: 0 0.1px 0.5px rgba(0, 0, 0, 0.003),
  0 0.3px 1.1px rgba(0, 0, 0, 0.004),
  0 0.6px 2.1px rgba(0, 0, 0, 0.005),
  0 1.1px 3.8px rgba(0, 0, 0, 0.006),
  0 2.1px 7.1px rgba(0, 0, 0, 0.007),
  0 5px 17px rgba(0, 0, 0, 0.01);
}

@media only screen and (max-width: 768px) {
  input {
    font-size: 12px;
    padding: 6px 15px;
  }
}
</style>