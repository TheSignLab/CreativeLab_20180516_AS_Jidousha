/* eslint-disable */
<template>
  <div class="wrapper">

    <div class="tabs">
      <div class="tab" @click="setTab('about')"   v-bind:class="{ 'active': this.tabName == 'about' }">¿Quiénes Somos?</div>
      <div class="tab" @click="setTab('contact')" v-bind:class="{ 'active': this.tabName == 'contact' }">Contacto</div>
    </div>

    <div class="contents" v-bind:style="{ transform: 'translateX(' + tabPosX + ')' }">

      <v-touch @swipeleft="setTab('contact')">
      <div class="content about">
        <div class="cover">
         <img class="img-car" src="../assets/img/mob-info/car-obj.png">
        </div>
        <div class="description">
          <h1>
            <span class="f-light">SU AUTO</span>
            <span class="f-bold">EN LAS MEJORES MANOS</span>
          </h1>
          <p>
            <span class="f-bold">Autostudio</span> le trae el sistema más avanzado
            de reparación exprés de su auto. Contacte uno de nuestros vehículos y
            descubra como está de regreso a la calle en tiempo récord.
          </p>
        </div>
      </div>
      </v-touch>

      <v-touch @swiperight="setTab('about')">
            <div class="content contact">

              <img class="contact-cover" src="../assets/img/mob-info/contact-img.png" width="100%" alt="AutoStudio! Con Nosotros">
              <ul class="contact-info">
              <li>Telefono : </li>
              <li>Correo : </li>
              <li>Web : </li>
              <li>Facebook : </li>
              </ul>
            </div>
      </v-touch>

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
    },
    setTabBySwipe(str, e) {
      console.log(str);
    }
  }
};
</script>

<style lang="less" scoped>
@import (reference) "../styles/main.less";
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
    font-family: "font-light";
    font-weight: "100";
    color: @color-dark-gray;
    text-align: center;
    box-sizing: border-box;
    padding: 5% 0%;
    border-bottom: 1px solid rgba(0, 0, 0, 0);
    &.active {
      color: @color-red;
      border-bottom: 1px solid @color-red;
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
  .align-items(flex-start);

  -webkit-transition: all 500ms ease-in-out;
  -moz-transition: all 500ms ease-in-out;
  -ms-transition: all 500ms ease-in-out;
  -o-transition: all 500ms ease-in-out;
  transition: all 500ms ease-in-out;
  .content {
    display: inline-block;
    width: 100vw;
    height: auto;
    overflow: hidden;
  }
}
.about .cover {
  display: block;
  background-color: rgba(0, 0, 0, 0);
  width: 100vw;
  height: 60vw;
  background-size: cover;
  background-position: center;
  background-image: url("../assets/img/mob-info/car-bg.png");

  .flex-display(flex);
  .flex-direction(column);
  .flex-wrap(nowrap);
  .justify-content(flex-end);
  .align-content(center);
  .align-items(center);

  img {
    display: block;
    width: 80%;
  }
}
.description {
  display: block;
  font-family: "font-light";
  box-sizing: border-box;
  padding: 0px 10vw;
  width: 100vw;
  height: 50vw;
  h1 {
    color: @color-red;
    display: block;
    font-size: 1.5em;
    margin: 0.5em 0em;
  }
  p {
    color: @color-black;
  }
}

ul.contact-info {
  width: 70%;
  margin: 0 auto;
  background-color: @color-gray;
  height: 100%;
  position: relative;
  top: -5vh;
  margin: 0% 5%;
  padding: 5% 5%;
  li {
    margin: 5%;
    display: block;
  }
}
</style>
