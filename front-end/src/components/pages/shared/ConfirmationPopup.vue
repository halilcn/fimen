<template>
  <div class="confirmation_popup_container">
    <div class="confirmation_popup_filter">

    </div>
    <div class="confirmation_popup_content">
      <div class="text">
        a asdasd ads
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "ConfirmationPopup"
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


.confirmation_popup_filter{

}

.confirmation_popup {
  position: fixed;
  background-color: white;
  border: 1px solid black;
}
</style>