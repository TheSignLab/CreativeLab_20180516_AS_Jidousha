const VuexMutations = {
  UPDATE_NAVTAB(state, tabName) {
    state.navigation.navbar.currentTab = tabName;
  },
  UPDATE_SERVICE_STEP(state, stepNumber) {
    state.navigation.service.step = stepNumber;
  },
  UPDATE_SERVICE_TYPE(state, stepType) {
    state.navigation.service.step = stepType;
  },
  UPDATE_SERVICE_HOUR(state, stepHour) {
    state.navigation.service.hour = stepHour;
  },
  UPDATE_SERVICE_PLACE(state, stepPlace) {
    state.navigation.service.place = stepPlace;
  },
  UPDATE_SERVICE_PAYMENT(state, stepPayment) {
    state.navigation.service.payment = stepPayment;
  },
  UPDATE_SERVICE_ADVISER(state, stepAdviser) {
    state.navigation.service.adviser = stepAdviser;
  }
};

export default VuexMutations;
