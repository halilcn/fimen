<template>
  <div class="user_part">
    <div class="title">
      {{ title }}
    </div>
    <div class="content">
      <slot name="content"/>
    </div>
  </div>
</template>

<script>
export default {
  name: "Part",
  props: {
    title: {
      required: true,
      type: String
    }
  }
}
</script>

<style scoped>
.user_part {
  background-color: white;
  border: 1px solid #eeeeee;
  border-radius: 10px;
  padding: 12px;
  margin-top: 30px;
  transition: .3s;

  box-shadow: 0 0px 0.4px rgba(0, 0, 0, 0.017),
  0 0px 1px rgba(0, 0, 0, 0.024),
  0 0px 1.9px rgba(0, 0, 0, 0.03),
  0 0px 3.4px rgba(0, 0, 0, 0.036),
  0 0px 6.3px rgba(0, 0, 0, 0.043),
  0 0px 15px rgba(0, 0, 0, 0.06);

}

.user_part:hover {
  transform: translateY(-2px);
}

.user_part > .title {
  font-family: 'Poppins', sans-serif;
  font-weight: 500;
  font-size: 18px;
  color: #666666;
}

.user_part > .content {
  margin-top: 8px;
}

@media only screen and (max-width: 768px) {
  .user_part > .title {
    font-size: 17px;
    text-align: center;
  }
}

</style>