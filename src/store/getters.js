const VuexGetters = {
  currentMobTab: state => state.mobActiveTab,
  getNavTab(state, getters) {
    return state.navigation.navbar.currentTab;
  },
  getNavigation: state => state.navigation.navbar.currentTab
};

export default VuexGetters;
