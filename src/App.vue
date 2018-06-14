<template>
  <div id="app">

    <header>
      <img class="header-logo" src="">
      <ul class="header-menu">
        <li><router-link to="home">Inicio</router-link></li>
        <li><router-link to="services">Servicios</router-link></li>
        <li><router-link to="request">Solicitar</router-link></li>
        <li><router-link to="contact">Contacto</router-link></li>
      </ul>
    </header>

    <main>
      <router-view></router-view>
    </main>

    <footer>
      <div class="row upper">
        <div class="col phone">
          <span class="label">TELÉFONO</span>
          <span class="data">+57 23423423</span>
        </div>
        <div class="col email">
          <span class="label">CORREO</span>
          <span class="data">info@autostudio-cr.com</span>
        </div>
        <div class="col social">
          <div class="icons">
            <img class="icon facebook" src="">
            <img class="icon instagram" src="">
          </div>
          <div class="place">
            <span>Costa Rica</span>
            <img class="icon place" src="">
          </div>
        </div>
      </div>
      <div class="row lower">
        <img class="footer-logo" src="">
      </div>
    </footer>

  </div>
</template>

<script>
    export default {
        name: 'app'
    }

</script>

<style>
    body {
        margin: 0;
    }

    #app {
        font-family: 'Avenir', Helvetica, Arial, sans-serif;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        color: #2c3e50;
    }

    main {
        text-align: center;
        margin-top: 40px;
    }

    header {
        margin: 0;
        height: 56px;
        padding: 0 16px 0 24px;
        background-color: #35495E;
        color: #ffffff;
    }

    header ul {
        padding: 0px;
        margin: 0px;
        list-style-type: none;
        display: inline;
        position: relative;
        font-size: 1em;
        line-height: 1;
        letter-spacing: .02em;
        font-weight: 400;
        box-sizing: border-box;
        padding-top: 16px;
    }

    header ul li {
        display: inline;
    }

</style>
