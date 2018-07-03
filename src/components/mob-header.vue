<template>
  <div class="wrapper">
    <img src="../assets/img/header-text-logo.png" class="logo">
    <img src="../assets/img/header-question-logo.png" class="question">
  </div>
</template>

<script>
export default {
  name: 'mob-header',
  data () {
    return {
      componentState: 's'
    }
  }
}
</script>

<style lang="less" scoped>
@import "../styles/main.less";
.wrapper {
   width: 100vw;
   height: 100%;

   box-sizing: border-box;

   padding: 10%;

   background-color: @color-white;

  border-bottom: 0.1vw solid @color-dark-gray;

  .flex-display(flex);
  .flex-direction(row);
  .flex-wrap(wrap);
  .justify-content(space-between);
  .align-content(center);
  .align-items(center);
}
.logo {
  width: 50%;
  margin: 0 auto;
  .align-self(center);
}
.question {
  width: 7.5%;
}
</style>
