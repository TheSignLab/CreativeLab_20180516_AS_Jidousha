<template>
  <div id="app">

    <main>
      <router-view></router-view>
    </main>

      <as-navbar></as-navbar>  

  </div>
</template>




<script>
    import NavbarComponent from './components/navbar.vue'

    export default {
        name: 'app',
        components: {
            'as-navbar': NavbarComponent,
        }
    }

</script>







<style>
    html,body{
        padding: 0px;
        margin: 0px;
    }
    #app {
        font-family: 'Avenir', Helvetica, Arial, sans-serif;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        text-align: center;
        color: #2c3e50;
        margin-top: 0px;
    }

</style>
