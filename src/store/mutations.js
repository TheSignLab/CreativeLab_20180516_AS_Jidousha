const VuexMutations = {
  UPDATE_NAVTAB(state, tabName) {
    state.navigation.navbar.currentTab = tabName;
  }
};

export default VuexMutations;
