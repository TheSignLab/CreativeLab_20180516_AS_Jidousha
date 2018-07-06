<template>
  <div class="device mobile" id="mobile-home">

    <div class="header">
      <mob-header></mob-header>
    </div>

    <div class="container">
      <div class="wrapper" >

        <div class="section" v-if="this.$store.getters['getNavTab'] == 'info'">
          <mob-info ></mob-info>
        </div>

        <div class="section" v-if="this.$store.getters['getNavTab'] == 'service'">
          <mob-service></mob-service>
        </div>

      </div>
    </div>

    <div class="navigator">
      <mob-navbar></mob-navbar>
    </div>
  </div>
</template>

<script>
import { mapState, mapMutations, mapActions, mapGetters } from "vuex";

import HeaderComponent from "../../components/mob-header.vue";
import NavbarComponent from "../../components/mob-navbar.vue";
import InfoComponent from "../../components/mob-info.vue";
import ServiceComponent from "../../components/mob-service.vue";
//console.log(this.$store.getters["getNavTab"]);
export default {
  name: "vw-home-mobile",
  components: {
    "mob-header": HeaderComponent,
    "mob-navbar": NavbarComponent,
    "mob-info": InfoComponent,
    "mob-service": ServiceComponent
  },
  computed: {
    ...mapState(["navigation"]),
    ...mapGetters(["getNavTab"])
  },
  methods: {}
};
</script>

<style lang="less">
@import (reference) "../../styles/main.less";

@header-h : 7.5vh;
@header-w : 100vw;

@nav-h : @header-h;
@nav-w : @header-w;

@container-dh : (@header-h + @nav-h);
@container-h : calc(100vh - 12vw - 12.5vw);
@container-w : @header-w;

#mobile-home {
  width: 100vw;
  height: 100vh;
  display: block;
}

.header {
  display: block;
  height: @header-h;
  width: @header-w;
}
.container {
  height: @container-h;
  width: @header-w;
  overflow: hidden;
  .wrapper {
    height: @container-h;
    height: 200vh;
    width: @header-w;
    .section {
      width: @header-w;
      height: 100vh;
      display: block;
    }
  }
}
.navigator {
  height: fit-content;
  width: @nav-w;
  position: fixed;
  bottom: 0px;
}
</style>
