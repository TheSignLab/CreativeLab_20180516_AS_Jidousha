/* eslint-disable */
<template>
  <div class="wrapper">

    <div class="tabs">
      <div class="tab" @click="setTab('about')"   v-bind:class="{ 'active': this.tabName == 'about' }">¿Quiénes Somos?</div>
      <div class="tab" @click="setTab('contact')" v-bind:class="{ 'active': this.tabName == 'contact' }">Contacto</div>
    </div>

    <div class="contents" v-bind:style="{ transform: 'translateX(' + tabPosX + ')' }">

      <div class="content about">
        <div class="cover">
          <img class="img-bottom" src="../assets/img/info-bg-color-01.png">
        </div>
        <div class="description">
          <h1>
            <span class="">SU AUTO</span>
            <span class="">EN LAS MEJORES MANOS</span>
          </h1>
          <p>
            <span class="f-bold">Autostudio</span> le trae el sistema más avanzado
            de reparación exprés de su auto. Contacte uno de nuestros vehículos y
            descubra como está de regreso a la calle en tiempo récord.
          </p>
        </div>
      </div>
    
      <div class="content contact">
        <h1> AutoStudio! </h1>
        <img class="contact-cover">
        <ul class="contact-info">
          <li>Telefono : </li>
          <li>Correo : </li>
          <li>Web : </li>
          <li>Facebook : </li>
        </ul>
      </div>

    </div>

  </div>
</template>

<script>
export default {
  name: "mob-info",
  data() {
    return {
      tabPosX: "0vw",
      tabName: "about"
    };
  },
  methods: {
    setTab(currentTab) {
      if (currentTab == "about") {
        this.tabPosX = "0vw";
      } else {
        this.tabPosX = "-100vw";
      }
      this.tabName = currentTab;
    }
  }
};
</script>

<style lang="less" scoped>
@import "../styles/main.less";
.tabs {
  display: block;
  width: 100vw;
  height: fit-content;
  background-color: @color-gray;

  .flex-display(flex);
  .flex-direction(row);
  .flex-wrap(wrap);
  .justify-content(center);
  .align-content(center);
  .align-items(center);

  .tab {
    width: 50%;
    display: inline-block;
    color: @color-dark-gray;
    text-align: center;
    box-sizing: border-box;
    padding: 5% 0%;
    &.active {
      color: @color-red;
    }
  }
}
.contents {
  display: block;
  width: 200vw;
  height: auto;

  .flex-display(flex);
  .flex-direction(row);
  .flex-wrap(nowrap);
  .justify-content(center);
  .align-content(center);
  .align-items(center);

  -webkit-transition: all 500ms ease-in-out;
  -moz-transition: all 500ms ease-in-out;
  -ms-transition: all 500ms ease-in-out;
  -o-transition: all 500ms ease-in-out;
  transition: all 500ms ease-in-out;
  .content {
    display: inline-block;
    width: 100vw;
    height: auto;
  }
}
.cover {
  display: block;
  background-color: @color-blue;
  width: 100vw;
  height: 75vw;
  background-size: cover;
  background-position: center;
  .img-bottom {
    display: block;
  }
}
.description {
  display: block;
  width: 100vw;
  height: 50vw;
}
</style>
