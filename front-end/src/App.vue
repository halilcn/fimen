<template>
  <div class="page_container">
    <router-view/>
  </div>
</template>

<style>
/* GLOBAL STYLE */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@200&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Rubik:wght@400&display=swap');

* {
  box-sizing: border-box;
  outline: none;
}

body, html {
  margin: 0px;
  height: 100%;
}

#app {
  height: 100%;
}

.page_container {
  height: 100%;
}

:root {
  --navy-blue-bg-color: #38496B;
  --navy-blue-bg-hover-color: #303e5a;
  --navy-red-bg-color: #FF7268;
  --navy-red-txt-color: #f86e64;
  --navy-red-bg-dark-color: #f16b61;
  --navy-red-input-focus: #ffa49d;
  --navy-blue-text-color: #2B374F;
  --navy-blue-text-light-color: #3b465a;
  --navy-user-profile-border-radius: 40%;
  --navy-mentor-mentee-text-color: #1e66cd;
  --navy-light-black: #888888;
  --navy-red-text-color: #ca2e2e;
  --navy-red-text-hover-color: #ffeded;
  --navy-green-color: #088d08;
}
</style>
