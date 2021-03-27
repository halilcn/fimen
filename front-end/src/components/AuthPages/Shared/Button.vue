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
  background-color: var(--navy-blue-bg-color);
  color: white;
  transition: .3s;
}

button:hover {
  background-color: var(--navy-blue-bg-hover-color);
  transform: translateY(-2px);
}

.button_disable {
  opacity: .1;
  cursor: default;
  pointer-events: none;
}
</style>
