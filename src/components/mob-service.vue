<template>
  <div class="wrapper">
    <div class="header">

      <div class="icon" v-for="icon in icons">
        <img :src="icon.imgSrc" v-bind:alt="icon.text">
        <h2>{{icon.text}}</h2>
      </div>

    </div>
    <div class="content"></div>
  </div>
</template>

<script>
export default {
  name: "mob-service",
  data() {
    return {
      path: "static/img/mob-service/icons/",
      ext: ".png",
      icons: [
        {
          text: "Servicios",
          imgSrc: "static/img/mob-service/icons/type-active.png"
        },
        {
          text: "Hora",
          imgSrc: "static/img/mob-service/icons/time-default.png"
        },
        {
          text: "Pago",
          imgSrc: "static/img/mob-service/icons/pay-default.png"
        },
        {
          text: "Asesor",
          imgSrc: "static/img/mob-service/icons/employee-default.png"
        }
      ]
    };
  },
  methods: {
    // a computed getter
    getIconSrc: function(icon) {
      return this.path + icon.imgSrc + "-" + icon.state + this.ext;
    }
  }
};
</script>

<style lang="less" scoped>
@import (reference) "../styles/main.less";

.header {
  height: 25vw;
  width: 100vw;
  text-align: center;
  .flex-display(flex);
  .flex-direction(row);
  .flex-wrap(nowrap);
  .justify-content(space-around);
  .align-content(center);
  .align-items(center);
  .icon {
    width: 20%;
    box-sizing: border-box;
    padding: 5px;
    text-align: center;

    h2 {
      font-family: "font-light";
      font-size: 0.85em;
      padding-top: 0.5em;
    }
    img {
      display: block;
      margin: 0 auto;
      width: 70%;
      height: auto;
    }
  }
}
.content {
  height: 100%;
  background-color: white;
}
</style>

