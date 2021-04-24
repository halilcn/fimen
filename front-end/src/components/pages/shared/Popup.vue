<template>
  <div class="popup_container">
    <div
        :style="{width:popupHeight+'%'}"
        class="popup">
      <div v-if="title" class="title">
        {{ title }}
      </div>
      <slot name="popup"/>
    </div>
  </div>
</template>

<script>
export default {
  name: "Popup",
  props: {
    popupHeight: {
      required: false,
      type: Number,
      default: 40
    },
    title: {
      required: false,
      default: false
    }
  }
}
</script>

<style scoped>
.popup_container {
  position: fixed;
  width: 100%;
  height: 100%;
  z-index: 99999;
  bottom: 0;
  left: 0;
  display: flex;
  justify-content: center;
  align-items: center;
}

.popup {
  position: relative;
  background-color: white;
  padding: 10px 10px;
  border: 1px solid black;
  border-radius: 3px;
}
.popup > .title{
  font-family: 'Rubik', 'sans-serif';
  font-size: 20px;
}
</style>