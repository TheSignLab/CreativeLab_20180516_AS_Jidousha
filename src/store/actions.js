const VuexActions = {
  update_navTab({ commit }, tabName) {
    commit("UPDATE_NAVTAB", tabName);
  }
};

export default VuexActions;
