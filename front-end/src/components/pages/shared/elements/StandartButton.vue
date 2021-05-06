<template>
  <div
      class="send_button"
      :class="{'button_disable':isDisable,'button_loading':isLoading}">
    {{ text }}
  </div>
</template>

<script>
export default {
  name: "StandartButton",
  props: {
    text: {
      default: 'Gönder'
    },
    isDisable: {
      default: true,
      type: Boolean
    },
    isLoading: {
      default: false,
      type: Boolean
    }
  }
}
</script>

<style scoped>
.send_button {
  cursor: pointer;
  padding: 10px 15px;
  background-color: var(--navy-red-bg-color);
  color: white;
  font-family: 'Poppins', sans-serif;
  font-weight: 400;
  font-size: 14px;
  border-radius: 4px;
  transition: .3s;
  text-align: center;
}

.send_button:hover {
  background-color: var(--navy-red-bg-dark-color);
  transform: translateY(-2px);
}

.button_disable {
  opacity: .5;
  pointer-events: none;
}

.button_loading {
  pointer-events: none;
  cursor: default;
  opacity: .8;
}
</style>