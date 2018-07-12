<template>
  <div class="wrapper">
    <div class="header">

      <div class="icon" v-for="icon in icons">
        <img :src="icon.imgSrc" v-bind:alt="icon.text">
        <h2>{{icon.text}}</h2>
      </div>

    </div>
    <div class="content">

      <div class="step types" v-if="this.$store.getters['getStep'] == 0">

        <h2 class="title">¿Qué servicio necesitas?</h2>
        <div class="card">
          <img src="../assets/img/mob-service/service/camanance.png" class="" alt="Camamances">
          <button @click="setStep(1,'camanance');">Reparación<br>de Camanances</button>
        </div>
        <div class="card">
          <img src="../assets/img/mob-service/service/parabrisas.png" class="" alt="Parabrisas">
          <button @click="setStep(1,'parabrisas');">Reparación<br>de Parabrisas</button>
        </div>

      </div>
      <div class="step time" v-if="this.$store.getters['getStep'] == 1">
        <h2>Selecciona Hora y Lugar</h2>
        <button @click="setStep(2,'parabrisas')">Siguiente</button>
      </div>
      <div class="step payment" v-if="this.$store.getters['getStep'] == 2">
        <h2>Selecciona Pago</h2>
          <button @click="setStep(3)">Siguiente</button>
      </div>
      <div class="step employee" v-if="this.$store.getters['getStep'] == 3">
        <h2>Pronto Juanito va a venir</h2>
        <button @click="setStep(4)">Siguiente</button>
      </div>
      <div class="step review" v-if="this.$store.getters['getStep'] == 4">
        <h2>Como te parecio Juanito?</h2>
        <button @click="setStep(5)">Calificar</button>
      </div>
      <div class="step thanks" v-if="this.$store.getters['getStep'] == 5">
        <h2>Gracias por confiar en nosotros!</h2>
        <button @click="setStep(0)"> Volver </button>
      </div>

    </div>
  </div>
</template>

<script>
import { mapState, mapMutations, mapActions, mapGetters } from "vuex";

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
    getIconSrc: function(icon) {
      return this.path + icon.imgSrc + "-" + icon.state + this.ext;
    },
    setStep: function(step, opt) {
      var self = this;
      self.$store.dispatch("update_serviceStep", step);

      if (opt === "camanance" || opt === "parabrisa") {
        self.$store.dispatch("update_serviceType", step);
      }
      if (opt === "hora") {
        self.$store.dispatch("update_serviceHour", opt);
      }
      if (opt === "place") {
        self.$store.dispatch("update_servicePlace", opt);
      }
      if (opt === "payment") {
        self.$store.dispatch("update_servicePayment", opt);
      }
      if (opt === "adviser") {
        self.$store.dispatch("update_serviceAdviser", opt);
      }
    },
    getStep: function() {}
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
  height: auto;
  background-color: white;
  font-family: "font-light";

  .flex-display(flex);
  .flex-direction(row);
  .flex-wrap(nowrap);
  .justify-content(center);
  .align-content(center);
  .align-items(center);

  h2.title {
    display: block;
    text-align: center;
    width: fit-content;
    background-color: @color-white;
    color: @color-dark-gray;
    border: 1px solid @color-dark-gray;
    border-radius: 1em;
    font-size: 1em;
    padding: 0.5em 1em;
    margin: 0em auto;
  }
}
.step {
  box-sizing: border-box;
  padding: 1em;
}
button {
  background-color: #fd0544;
  color: #fff;
  width: auto;
  min-width: -webkit-fit-content;
  min-width: -moz-fit-content;
  min-width: fit-content;
  border: none;
  border: 0.25em solid #fd0544;
  border-radius: 2em;
  padding: 0.5em 1em;
}
.card {
  img {
    display: block;
    margin: 0 auto;
    width: 30%;
  }
  button {
    display: block;
    margin: 0 auto;
  }
}
</style>

