<template>
  <div class="wrapper">
    <div class="header">

      <div class="icon" v-for="icon in icons">
        <img :src="icon.imgSrc" v-bind:alt="icon.text">
        <h2>{{icon.text}}</h2>
      </div>

    </div>
    <div class="content">

      <div class="step types" v-if="step == 0">
        <h2>Selecciona Tipo de Servicio</h2>
        <button @click="step=1"></button>
      </div>
      <div class="step time" v-if="step == 1">
        <h2>Selecciona Hora y Lugar</h2>
        <button @click="step=2"></button>
      </div>
      <div class="step payment" v-if="step == 2">
        <h2>Selecciona Pago</h2>
          <button @click="step=3"></button>
      </div>
      <div class="step employee" v-if="step == 3">
        <h2>Pronto Juanito va a venir</h2>
        <button @click="step=4"></button>
      </div>
      <div class="step review" v-if="step == 4">
        <h2>Como te parecio Juanito?</h2>
        <button @click="step=5"></button>
      </div>
      <div class="step thanks" v-if="step == 5">
        <h2>Gracias por confiar en nosotros!</h2>
        <button @click="step=0"></button>
      </div>

    </div>
  </div>
</template>

<script>
export default {
  name: "mob-service",
  data() {
    return {
      step: 0,
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

