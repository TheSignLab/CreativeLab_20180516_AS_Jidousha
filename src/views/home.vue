<template>
  <div id="home">
      
      <div class="img-top">
        <img src="../assets/img/info/home.png">
      </div>
      
      <div class="img-text">
        <img src="../assets/img/info/text.svg">
      </div>

  </div>
</template>

<script>
    export default {
        name: 'home'
    }

</script>

<style lang="less" scoped>
    
     @import "../assets/css/main.less";
    
    .img-top {
        height: 50vh;
    }
    .img-text{
        height: 50vh;
        box-sizing: border-box;
        padding-bottom: 20vh;
        .grid-row-center(); 
    }
    .img-top img{
        width: 100%;
        display: block;
        margin: 0 auto;
    }
    .img-text img{
        width: 80%;
        display: block;
        margin: 0 auto;
    }
</style>
