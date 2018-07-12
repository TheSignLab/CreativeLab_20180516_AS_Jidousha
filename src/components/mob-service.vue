<template>
  <div class="wrapper">
    <!-- Header : Menu de iconos de servicios -->
    <div class="header">
      <div class="icon" v-for="icon in icons">
        <img :src="icon.imgSrcActive" v-bind:alt="icon.text" v-if="icon.active">
        <img :src="icon.imgSrcDefault" v-bind:alt="icon.text" v-if="!icon.active">
        <h2>{{icon.text}}</h2>
      </div>
    </div>
    <!-- /Header : Menu de iconos de servicios -->
    <div class="content">

      <!--   Paso [0] : Seleccionar Tipo de Servicio   -->
      <div class="step types" v-if="getStep() == 'step-type'">
        <h2 class="title">¿Qué servicio necesitas?</h2>
        <div class="card">
          <img src="../assets/img/mob-service/service/camanance.png" alt="Camamances">
          <button @click="setStep('step-type-confirm','camanance');">
            Reparación<br>de Camanances
            </button>
        </div>
        <div class="card">
          <img src="../assets/img/mob-service/service/parabrisas.png" alt="Parabrisas">
          <button @click="setStep('step-type-confirm','parabrisas');">
            Reparación<br>de Parabrisas
            </button>
        </div>
      </div>

      <!--  Paso [1] : Confirmar Tipo de Servicio   -->
      <div class="step type-confirm" v-if="getStep() == 'step-type-confirm'">

        <div class="step-tabs header">
          <div class="step-tabs tab camanaces" @click="setTypeOfService('camanance')" v-bind:class="{ 'active': getTypeOfService() == 'camanance' }">CAMAMANCES</div>
          <div class="step-tabs tab parabrisas" @click="setTypeOfService('parabrisas')" v-bind:class="{ 'active': getTypeOfService() == 'parabrisas' }">PARABRISAS</div>
        </div>

        <div class="step-tabs content">

          <div class="step-tab camanance" v-if="getTypeOfService() == 'camanance'">
          <h2 class="title">Reparación de Camanances</h2>
          <h3 class="subtitle">Condiciones del servicio</h3>
          <img class="logo" src="../assets/img/mob-service/service/camanance.png">
          <ul class="list">
            <li class="head">Golpes que : </li>
            <li class="item">Son menores a 10 cm de diámetro.</li>
            <li class="item">No afectaron la pintura del vehículo <br> (no la reventaron).</li>
            <li class="item">Afectaron la parte metálica del vehiculo.*</li>
            <span>*Con excepción de aluminio o hierro<br> (parachoques de Pick up).</span>
          </ul>
          </div>

          <div class="step-tab parabrisas" v-if="getTypeOfService() == 'parabrisas'">
          <h2 class="title">Reparación de Parabrisas</h2>
          <h3 class="subtitle">Condiciones del servicio</h3>
          </div>

        </div>
        <div class="button-group">
        <button @click="setStep('step-type');">ATRAS</button>
        <button @click="setStep('step-time');">SIGUENTE</button>
        </div>
        <span class="disclaimer">Al continuar confirma aceptar los terminos y condiciones del servicio</span>
      </div>

      <!--  Paso [2] : Seleccionar Hora del Servicio   -->
      <div class="step types" v-if="getStep() == 'step-time'">
        <h2 class="title">Seleccionar Hora y Dia del servicio</h2>
        <button @click="setStep('step-type-confirm');">ATRAS</button>
        <button @click="setStep('step-place');">SIGUENTE</button>
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
    setIcon(iconNumber) {},
    setStep: function(step, opt) {
      var self = this;
      self.$store.dispatch("update_serviceStep", step);

      if (opt === "camanance" || opt === "parabrisa") {
        self.$store.dispatch("update_serviceType", opt);
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
    getStep: function() {
      return this.$store.getters["getStep"];
    },
    getTypeOfService: function() {
      return this.$store.getters["getTypeOfService"];
    },
    setTypeOfService: function(serviceType) {
      this.$store.dispatch("update_serviceType", serviceType);
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
  height: auto;
  background-color: white;
  font-family: "font-light";

  .flex-display(flex);
  .flex-direction(row);
  .flex-wrap(nowrap);
  .justify-content(center);
  .align-content(center);
  .align-items(center);

  .title {
    display: block;
    text-align: center;
    width: fit-content;
    background-color: @color-white;
    color: @color-dark-gray;
    border: 1px solid @color-dark-gray;
    border-radius: 1em;
    font-size: 1em;
    padding: 0.5em 1em;
    margin: 1em auto;
  }
  .subtitle {
    display: block;
    text-align: center;
    width: fit-content;
    background-color: @color-white;
    color: @color-dark-gray;
    border: 1px solid rgba(0, 0, 0, 0);
    border-radius: 0.5em;
    font-size: 0.75em;
    padding: 0.25em 0.5em;
    margin: 0em auto;
  }
}
.step {
  box-sizing: border-box;
  padding: 0em;
}
button {
  background-color: #fd0544;
  color: #fff;
  width: auto;
  min-width: -webkit-fit-content;
  min-width: -moz-fit-content;
  min-width: fit-content;
  border: none;
  border: 0.5em solid #fd0544;
  border-radius: 1.5em;
  font-size: 0.75em;
  padding: 0.25em 0.5em;
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
.button-group {
  display: block;
  width: fit-content;
  margin: 0 auto;
}
.disclaimer {
  display: block;
  font-family: "font-light";
  color: #363636;
  font-size: 0.85em;
  width: 70%;
  margin: 1.5em auto;
  text-align: center;
}

.step-tabs.header {
  background-color: @color-white;
  width: 100%;
  height: auto;
  .tab {
    font-family: "font-bold";
    padding: 0.5em 1em;
    border: none;
    border-bottom: 0.15em solid @color-dark-gray;
    width: 50%;
    height: 100%;
    box-sizing: border-box;
    &.active {
      border-bottom: 0.15em solid @color-red;
    }
  }
}
.step-tabs.content {
  width: 85%;
  display: block;
  margin: 0 auto;
  padding: 0.5em;
  box-sizing: border-box;
  .title {
    margin: 0.25em auto;
    padding: 0.25em;
  }
  .logo {
    width: 25%;
    display: block;
    margin: 0 auto;
  }
  .list {
    font-family: "font-light";
    font-size: 0.75em;
    li {
      margin: 0.5em 0em;
      &.head {
        margin: 0.85em 0em;
      }
      &.item:before {
        content: "\2713 ";
      }
    }
  }
}
</style>

