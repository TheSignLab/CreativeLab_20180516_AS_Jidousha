<template>
  <div class="wrapper">
    <!-- Header : Menu de iconos de servicios -->
    <div class="header">
      <div class="icon" v-for="icon in icons">
        <img v-bind:src="path + icon.img + icon.status + ext" v-bind:alt="icon.title">
        <h2>{{icon.text}}</h2>
      </div>
    </div>
    <!-- /Header : Menu de iconos de servicios -->
    <div class="content">
    </div>

  </div>
</template>
<script>
// import for VUEX
import { mapState, mapMutations, mapActions, mapGetters } from "vuex";
// import vue components

// main vue component
export default {
  name: "mob-service",
  data() {
    return {
      path: "static/img/mob-service/icons/",
      ext: ".png",
      icons: [
        {
          k: 0,
          title: "Servicio",
          img: "icon-type-",
          status: "active"
        },
        {
          k: 1,
          title: "Tiempo",
          img: "icon-time-",
          status: "default"
        },
        {
          k: 2,
          title: "Pago",
          img: "icon-payment-",
          status: "default"
        },
        {
          k: 3,
          title: "Asesor",
          img: "icon-advisor-",
          status: "default"
        }
      ]
    };
  },
  methods: {
    setTab(x) {
      for (let k = 0; k < this.icons.length; k++) {
        this.icons[k].status = "default";
      }
      this.icons[x].status = "active";
    }
  }
};
</script>
<style lang="less" scoped>
@import (reference) "../styles/main.less";
.header {
  width: 100%;
  display: block;
}
.icon {
  width: 20%;
  display: inline-block;
  img {
    display: block;
    width: 75%;
  }
}
</style>

