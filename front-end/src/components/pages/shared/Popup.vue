<template>
  <div class="popup_container">
    <transition name="popup-scale" mode="out-in">
      <div
          v-if="$store.state.isShowPopup"
          :style="{width:popupHeight+'%'}"
          class="popup">
        <div class="top">
          <div v-if="title" class="title">
            {{ title }}
          </div>
          <div @click="$store.commit('setShowPopup',false)" class="close">
            <i class="bi bi-x"></i>
          </div>
        </div>
        <slot name="popup"/>
      </div>
    </transition>
    <div @click="$store.commit('setShowPopup',false)" class="filter"></div>
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

<style>
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

.popup_container > .filter {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: transparent;
  backdrop-filter: blur(3px);
  z-index: 0;
}

.popup {
  position: relative;
  background-color: white;
  padding: 10px 15px;
  border: 1px solid #dedede;
  border-radius: 5px;
  z-index: 1;
  height: 85%;
  overflow-y: auto;

  box-shadow: 0 0px 0.3px rgba(0, 0, 0, 0.02),
  0 0px 0.7px rgba(0, 0, 0, 0.028),
  0 0px 1.3px rgba(0, 0, 0, 0.035),
  0 0px 2.2px rgba(0, 0, 0, 0.042),
  0 0px 4.2px rgba(0, 0, 0, 0.05),
  0 0px 10px rgba(0, 0, 0, 0.07);
}
.popup::-webkit-scrollbar {
  width: 5px;
}

.popup::-webkit-scrollbar-thumb {
  background: #b1b1b1;
  border-radius: 5px;
}

.popup::-webkit-scrollbar-thumb:hover {
  background: #a5a5a5;
}

.popup > .top {
  border-bottom: 1px solid #ffd6d6;
  padding-bottom: 2px;
  display: flex;
  align-items: center;
}

.popup > .top > .title {
  font-family: 'Poppins', sans-serif;
  font-weight: 500;
  font-size: 19px;
  color: var(--navy-red-bg-color);
}

.popup > .top > .close {
  margin-left: auto;
  cursor: pointer;
  color: #4a4a4a;
  font-size: 27px;
  border-radius: 100%;
  padding: 0 3px;
}

.popup > .top > .close:hover {
  background-color: #f0f0f0;
}

@keyframes popup-scale-active {
  from {
    opacity: 0;
  }
  to {
    opacity: 0;
  }
}

@keyframes popup-scale-leave {
  from {
    opacity: 1;
  }
  to {
    opacity: 0;
  }
}

.popup-scale-enter-active {

  animation: popup-scale-active .5s;
  display: none;
}

.popup-scale-leave-active {
  animation: popup-sacle-leave .5s;
}
</style>