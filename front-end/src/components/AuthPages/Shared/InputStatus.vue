<template>
  <div class="input_status">
    <div class="icon">
      <i v-if="status" class="bi bi-check-circle-fill success"></i>
      <i v-if="!status" class="bi bi-exclamation-circle-fill warning"></i>
    </div>
    <div
        v-if="!status"
        class="tooltip">
      <slot
          name="errors"
          class="tooltip">
      </slot>
      <!--  <span>
          <span class="number">
             1
          </span>
          haokdsakdja jda
        </span>-->
    </div>
  </div>
</template>

<script>
export default {
  name: "InputStatus",
  props: {
    status: {
      type: Boolean,
      required: true
    }
  }
}
</script>

<style scoped>
.input_status {
  position: absolute;
  align-self: center;
  right: -30px;
}

.input_status > .icon {
  font-size: 24px;
}

.input_status > .icon > .warning {
  color: #e51616;
}

.input_status > .icon > .success {
  color: #1da41d;
}

.input_status:hover .tooltip {
  display: flex;
}

.input_status > .tooltip {
  position: absolute;
  width: 200px;
  bottom: 23px;
  z-index: 1;
  display: none;
  flex-direction: column;
  padding: 5px 10px;
  border-radius: 3px;
  font-family: 'Montserrat', sans-serif;
  font-size: 10px;
  left: 50%;
  transform: translate(-50%, 0);
  background-color: #fff5f5;
  border: 1px solid #ffecec;
  color: #d70f0f;

  box-shadow: 0 0px 0.4px rgba(0, 0, 0, 0.011),
  0 0px 1.1px rgba(0, 0, 0, 0.016),
  0 0px 2px rgba(0, 0, 0, 0.02),
  0 0px 3.6px rgba(0, 0, 0, 0.024),
  0 0px 6.7px rgba(0, 0, 0, 0.029),
  0 0px 16px rgba(0, 0, 0, 0.04);
}

.input_status > .tooltip > span {
  text-align: justify;
  margin: 2px 0px;
}

.input_status > .tooltip > span > .number {
  font-family: 'Rubik', sans-serif;
}
</style>
