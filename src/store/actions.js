const VuexActions = {
  update_navTab({ commit }, tabName) {
    commit("UPDATE_NAVTAB", tabName);
  },
  update_serviceStep({ commit }, stepNumber) {
    commit("UPDATE_SERVICE_STEP", stepNumber);
  },
  update_serviceType({ commit }, serviceType) {
    commit("UPDATE_SERVICE_TYPE", serviceType);
  },
  update_serviceHour({ commit }, serviceHour) {
    commit("UPDATE_SERVICE_HOUR", serviceHour);
  },
  update_servicePlace({ commit }, servicePlace) {
    commit("UPDATE_SERVICE_PLACE", servicePlace);
  },
  update_servicePayment({ commit }, servicePayment) {
    commit("UPDATE_SERVICE_PAYMENT", servicePayment);
  },
  update_serviceAdviser({ commit }, serviceAdviser) {
    commit("UPDATE_SERVICE_ADVISER", serviceAdviser);
  }
};

export default VuexActions;
