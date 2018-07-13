<template>
  <div class="wrapper">

    <!-- Header : Menu de iconos de servicios -->
    <div class="header">
      <div class="icon" v-for="icon in icons"
                        v-bind:key="icon.title">

        <img v-bind:src="path + icon.img + icon.status + ext" v-bind:alt="icon.title">
        <h2>{{icon.title}}</h2>

      </div>
    </div>

    <!-- /Header : Menu de iconos de servicios -->
    <div class="content">

    <div class="step-view">
       <as-step-type></as-step-type>
    </div>

    <div class="step-view">
       <as-step-type></as-step-type>
    </div>

    <div class="step-view">
       <as-step-type></as-step-type>
    </div>

    </div>

  </div>
</template>
<script>
// import for VUEX
import { mapState, mapMutations, mapActions, mapGetters } from "vuex";

// import vue components
import viewType from "./mob-steps/mob-step-type";
import viewTerms from "./mob-steps/mob-step-terms";
import viewTime from "./mob-steps/mob-step-time";
import viewPlace from "./mob-steps/mob-step-place";

// main vue component
export default {
  name: "mob-service",
  components: {
    "as-step-type": viewType
  },
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
  .displayRowExpand();
  height: 20vw;
  box-sizing: border-box;
  .icon {
    width: 15%;
    height: fit-content;
    box-sizing: border-box;
    display: block;
    text-align: center;
    font-family: "font-light";
    font-size: 0.85em;
    color: @color-dark-gray;
    h2 {
      padding: 0.15em 0em;
    }
    img {
      display: block;
      margin: 0 auto;
      width: 75%;
    }
    &.active {
      color: @color-red;
    }
  }
}
.content {
  display: block;

  width: 100%;
  height: @view-height;

  background-color: @color-white;
}
</style>

