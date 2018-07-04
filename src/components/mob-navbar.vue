<template>
<div class="wrapper">
  <div class="profile-icon">
    <img class="icon" src="../assets/img/navbar/profile.png" alt="">
  </div>
  <div class="tabs">
    <div class="tab info" @click="updateTab('info')">
      info 
    </div>
    <div class="tab service" @click="updateTab('service')"> 
      service
    </div>
  </div>
</div>
</template>

<script>

export default {
  name: "mob-navbar",
  data() {
    return {
      mobActiveTab: " "
    };
  },
  mounted() {
    this.updateTab('info');
  },
  methods: {
    updateTab(tabName) {
      this.$store.dispatch('update_navTab',tabName)
    }
  }
};
</script>

<style scoped lang="less">
@import "../styles/main.less";
.wrapper{
  height: 100%;
  width: 100%;
}
.profile-icon,.tabs{
position: absolute;
bottom: 0px;
height: 17.5vw;
}
.profile-icon{
  height: 35vw;
      left: calc(50% - 10vw);
  img{
    height: 100%;
  }
}
.tabs {
  display: block;
  
  .flex-display(flex);
  .flex-direction(row);
  .flex-wrap(wrap);
  .justify-content(center);
  .align-content(center);
  .align-items(center);

  .tab {
    display: inline-block;
    width: 50vw;
    height: 100%;
    background-color: @color-gray;
    text-align: center;
  }
}
</style>
