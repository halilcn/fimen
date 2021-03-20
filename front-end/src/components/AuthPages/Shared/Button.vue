<template>
  <button
      :class="{'button_disable':isDisable}"
      type="submit">
    {{ text }}
  </button>
</template>

<script>
export default {
  name: "AuthButton",
  props: {
    text: {
      required: true
    },
    isDisable: {
      default: true
    }
  }
}
</script>

<style scoped>
button {
  margin-top: 20px;
  width: 100%;
  padding: 10px;
  cursor: pointer;
  font-family: 'Poppins', sans-serif;
  font-weight: 500;
  font-size: 15px;
  border: 0px;
  border-radius: 3px;
  background-color: #38496b;
  color: white;
  transition: .3s;
}

button:hover {
  background-color: #303e5a;
  transform: translateY(-2px);
}

.button_disable {
  opacity: .1;
  cursor: default;
  pointer-events: none;
}
</style>
