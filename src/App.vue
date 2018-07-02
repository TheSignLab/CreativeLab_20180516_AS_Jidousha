<template>
  <div id="app-autostudio">
      <router-view ></router-view>
      <transition name="slide-fade">
       <preloader v-if="!this.isReady"></preloader>
      </transition>
  </div>
</template>

<script>
import PreloaderComponent from './components/preloader.vue'
export default {
  name: 'mm-app-autostudio',
  data () {
    return {
      isReady: false
    }
  },
  mounted () {
    var self = this
    setTimeout(function () {
      self.isReady = true
    }, 2500)
  },
  components: {
    'preloader': PreloaderComponent
  }
}
</script>

<style lang="less">
    @import "./styles/main.less";
    @import "./styles/reset.less";
</style>
