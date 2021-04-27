<template>
  <div class="tooltip">
    <i class="bi bi-info-circle"></i>
    <span class="tooltiptext">{{ text }}</span>
  </div>
</template>

<script>
export default {
  name: "Tooltip",
  props: {
    text: {
      required: true,
    }
  }
}
</script>

<style scoped>
.tooltip {
  position: relative;
  display: inline-block;
  color: var(--navy-red-bg-dark-color);
  font-size: 17px;
  margin-left: 5px;
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 120px;
  background-color: var(--navy-red-bg-dark-color);
  color: white;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;
  position: absolute;
  z-index: 1;
  bottom: 150%;
  left: 50%;
  margin-left: -60px;
  font-size: 11px;

  box-shadow: 0 0px 0.2px rgba(0, 0, 0, 0.008),
  0 0px 0.5px rgba(0, 0, 0, 0.012),
  0 0px 0.9px rgba(0, 0, 0, 0.015),
  0 0px 1.6px rgba(0, 0, 0, 0.018),
  0 0px 2.9px rgba(0, 0, 0, 0.022),
  0 0px 7px rgba(0, 0, 0, 0.03);

}

.tooltip .tooltiptext::after {
  content: "";
  position: absolute;
  top: 100%;
  left: 50%;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: var(--navy-red-bg-dark-color) transparent transparent transparent;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
}
</style>