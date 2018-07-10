<template>
  <div class="wrapper">
    <div class="header">

      <div class="icon" v-for="icon in icons">
        <img v-bind:src="require(path+icon.imgSrc+'-'+icon.state+ext)" v-bind:alt="icon.text">        <h2>Servicio</h2>
      </div>

    </div>
    <div class="content"></div>
  </div>
</template>

<script>
export default {
  name: "mob-service",
  data() {
    return {
      path: "../assets/img/mob-service/icons/",
      ext: ".png",
      icons: [
        {
          text: "Servicio",
          state: "active",
          imgSrc: "type"
        }
      ]
    };
  }
};
</script>

<style>
</style>

