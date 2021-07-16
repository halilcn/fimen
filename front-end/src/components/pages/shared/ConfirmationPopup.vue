<template>
  <div class="confirmation_popup_container">
    <div class="confirmation_popup_filter">
    </div>
    <div class="confirmation_popup_content">
      <div class="text">
        {{ text }}
      </div>
      <div class="actions">
        <div @click="$emit('cancelClick')" class="cancel_btn">
          Geri Dön
        </div>
        <div @click="$emit('confirmationClick')" class="confirmation_btn">
          Devam Et
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "ConfirmationPopup",
  props: {
    text: {
      required: true,
    }
  }
}
</script>

<style scoped>
.confirmation_popup_container {
  position: absolute;
  top: 0;
  left: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  width: 100%;
  height: 100%;
}


.confirmation_popup_filter {
  background-color: #373737;
  position: fixed;
  width: 100%;
  height: 100%;
  z-index: 101;
  opacity: .4;
}

.confirmation_popup_content {
  display: flex;
  flex-direction: column;
  position: fixed;
  background-color: white;
  border: 1px solid #e2e2e2;
  border-radius: 5px;
  padding: 10px;
  z-index: 102;
  width: 30%;
}

.confirmation_popup_content > .text {
  font-family: 'Poppins', sans-serif;
  font-size: 14px;
  color: var(--navy-blue-text-color);
}


.confirmation_popup_content > .actions {
  display: flex;
  align-items: center;
  font-family: 'Poppins', sans-serif;
  font-weight: 500;
  font-size: 14px;
  cursor: pointer;
  margin-left: auto;
  margin-top: 10px;
}

.confirmation_popup_content > .actions > div{
  padding: 4px 10px;
  border-radius: 4px;
}

.actions > .confirmation_btn {
  color: var(--navy-blue-text-color);
  padding: 4px 10px;
}

.actions > .confirmation_btn:hover {
  background-color: #f5f5f5;
}

.actions > .cancel_btn {
  color: var(--navy-red-text-color);
  margin-right: 5px;
}

.actions > .cancel_btn:hover {
  background-color: var(--navy-red-text-hover-color);
}

</style>