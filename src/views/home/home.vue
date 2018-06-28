<template>
  <div class="view home" id="vw-home">

    <div class="device mobile">
      <vw-home-mobile></vw-home-mobile>
    </div>

    <div class="device desktop">
      <vw-home-desktop></vw-home-desktop>
    </div>

  </div>
</template>

<script>
  import ViewHomeMobileComponent from './home_mobile.vue'
  import ViewHomeDesktopComponent from './home_desktop.vue'
  export default {
    name: 'ViewHome',
    components: {
      'vw-home-mobile': ViewHomeMobileComponent,
      'vw-home-desktop': ViewHomeDesktopComponent
    }
  }
</script>

<style lang="less">
    @import "../../styles/main.less";
    // ---------------------------------------------------- //
    // -- HOME STYLES : MOBILE FIRST                     -- //
    // ---------------------------------------------------- //
    .view{
      display: block;
    }

</style>
