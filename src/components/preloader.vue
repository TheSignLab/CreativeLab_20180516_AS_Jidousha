<template>
  <div class="preloader" id="app-preloader">
    <div class="wrapper">
      <img src="../assets/img/preloader-logo.png" class="logo">
      <img src="../assets/img/loading.gif" class="spinner">
    </div>
  </div>
</template>

<script>
export default {
  name: 'App-Preloader'
}
</script>

<style lang="less" scoped>
@import "../styles/main.less";
// ---------------------------------------------------- //
// -- PRELOADER STYLES : MOBILE FIRST                -- //
// ---------------------------------------------------- //

.preloader {
  display: block;

  position: absolute;
  top: -20vh;
  left: 0px;

  width: 100vw;
  height: 130vh;

  color: @color-white;
  background-color: @color-blue;

  .flex-centerAll();
}

.wrapper {
  display: block;

  width: 50vw;
  height: fit-content;
  overflow: hidden;

  .flex-centerAll();
}

.logo {
  display: block;

  width: 50vw;
  height: auto;
}

.spinner{
  display: block;

  margin: 5vw;

  width: 25vw;
  height: auto;
}

.block {
  width: 50vw;
  height: 100%;
  display: block;

  position: relative;
  top: -100%;
  background: rgba(0, 0, 0, 0);
  background: linear-gradient(
    to right bottom,
    rgba(0, 0, 0, 0) 50%,
    @color-blue 50%
  );
}
// ---------------------------------------------------- //
</style>
