<template>
  <div class="wrapper">

    <div class="tabs">
      <div class="tab" @click="setTab('about')">¿Quiénes Somos?</div>
      <div class="tab" @click="setTab('contact')">Contacto</div>
    </div>

    <div class="contents">
      <div class="content about" v-if="this.tabSelected == 'about'">

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
      <div class="content contact" v-if="this.tabSelected == 'contact'"></div>
    </div>

  </div>
</template>

<script>
export default {
  name: 'mob-info',
  data () {
    return {
      tabSelected: 'about'
    }
  },
  methods: {
    setTab (currentTab) {
      this.tabSelected = currentTab
    }
  }
}
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
    color: @color-red;
    text-align: center;
    box-sizing: border-box;
    padding: 5% 0%;
  }
}
.cover {
  display: block;
  position: absolute;
  background-color: @color-blue;
  width: 100vw;
  height: 75vw;
  background-size: cover;
  background-position: center;
  .img-bottom{
    display: block;
    position: absolute;
    bottom: 0px;
  }
}
.description {
  display: block;
  width: 100vw;
  height: 50vw;
bottom: 0px;
    position: absolute;
}
</style>
