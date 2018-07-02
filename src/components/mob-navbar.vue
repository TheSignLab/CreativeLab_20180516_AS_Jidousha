<template>
<div class="wrapper">
  <div class="profile-icon">
    <img class="icon" src="" alt="">
  </div>
  <div class="tabs">
    <div class="tab"> AutoStudio </div>
    <div class="tab"> Servicio </div>
  </div>
</div>
</template>

<script>
export default {
  name: "mob-navbar",
  data() {
    return {
      componentState: " "
    };
  }
};
</script>

<style scoped lang="less">
.tabs {
  display: block;
  .tab {
    display: inline-block;
    width: 100vw;
  }
}
</style>
