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

              <div class="img-contact-cover">
               <img class="contact-cover" src="../assets/img/mob-info/contact-img.png"  alt="AutoStudio! Con Nosotros">
              </div>

              <ul class="contact-info">
                <li> <img src="../assets/img/mob-info/contact-call.png">506 72053596</li>
                <li> <img src="../assets/img/mob-info/contact-email.png">info@autostudio-cr.com</li>
                <li> <img src="../assets/img/mob-info/contact-facebook.png">Autostudio </li>
              </ul>
            </div>
      </v-touch>

    </div>

  </div>
</template>

<script>
import { mapState, mapMutations, mapActions, mapGetters } from "vuex";

export default {
  name: "mob-info",
  data() {
    return {
      tabPosX: "0vw",
      tabName: "about"
    };
  },
  computed: {
    ...mapState(["navigation"]),
    ...mapGetters(["getNavTab"])
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
@view-h : @container-h;
@view-tabs-h : 12vw;
@content-h : calc(@view-h - @view-tabs-h);
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
    font-size: 0.75em;
    color: @color-dark-gray;
    text-align: center;
    box-sizing: border-box;
    padding: 3.5% 0%;
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
  height: @content-h;

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
    height: @view-h;
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
  height: calc(100vh - 50vw - 65vw);
  .flex-display(flex);
  .flex-direction(column);
  .flex-wrap(nowrap);
  .justify-content(center);
  .align-content(center);
  .align-items(center);
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
.contact {
  background-color: white;
  height: @view-h;
}
ul.contact-info {
  font-size: 4vw;
  width: 100%;
  margin: 0 auto;
  background-color: #f2f2f2;
  height: calc(@content-h / 2);
  box-sizing: border-box;
  position: relative;
  top: -0vh;
  padding: 5% 5%;
  border: 0px;
  .flex-display(flex);
  .flex-direction(column);
  .flex-wrap(nowrap);
  .justify-content(flex-start);
  .align-content(center);
  .align-items(center);

  li {
    margin: 1em;
    padding: 0%;
    width: 100%;
    border-bottom: 1px solid @color-gray;
    display: block;
    font-family: "font-light";
    .flex-display(flex);
    .flex-direction(row);
    .flex-wrap(nowrap);
    .justify-content(flex-start);
    .align-content(center);
    .align-items(center);
    img {
      display: inline;
      height: 1.5em;
      margin-right: 5%;
    }
  }
}
.img-contact-cover {
  height: calc(@content-h / 2);
  img {
    display: block;
    height: 100%;
    min-width: 100vw;
    object-fit: cover;
  }
}
</style>
