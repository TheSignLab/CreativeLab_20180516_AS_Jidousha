<template>
  <div class="device mobile" id="mobile-home">
    <div class="header">
      <mob-header></mob-header>
    </div>
    <div class="container">
      <mob-info></mob-info>
      <mob-service></mob-service>
    </div>
    <div class="navigator">
      <mob-navbar></mob-navbar>
    </div>
  </div>
</template>

<script>
  import HeaderComponent from '../../components/mob-header.vue'
  import NavbarComponent from '../../components/mob-navbar.vue'
  import InfoComponent from '../../components/mob-info.vue'
  import ServiceComponent from '../../components/mob-service.vue'
  export default {
    name: 'vw-home-mobile',
    components: {
      'mob-header': HeaderComponent,
      'mob-navbar': NavbarComponent,
      'mob-info': InfoComponent,
      'mob-service': ServiceComponent
    }
  }
</script>

<style lang="less">
@import "../../styles/main.less";

@header-h : 20vw;
@header-w : 100vw;

@nav-h : @header-h;
@nav-w : @header-w;

@container-dh : (@header-h + @nav-h);
@container-h : calc(100vh - (@container-dh));
@container-w : @header-w;

#mobile-home{
  width: 100vw;
  height: 100vh;
  display:block;
}

.header{
  display: block;
  height: @header-h;
  width: @header-w;
}
.container{
  height: @container-h;
  width: @header-w;
  overflow: hidden;
}
.navigator{
  height: @nav-h;
  width: @nav-w;
}
</style>
