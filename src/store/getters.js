const VuexGetters = {
  currentMobTab: state => state.mobActiveTab,
  getNavTab(state, getters) {
    return state.navigation.navbar.currentTab;
  },
  getStep: (state, getters) => {
    return state.navigation.service.step;
  },
  getTypeOfService: (state, getters) => {
    return state.navigation.service.type;
  },
  getNavigation: state => state.navigation.navbar.currentTab
};

export default VuexGetters;
