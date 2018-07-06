import Vue from "vue";
import Vuex from "vuex";

import VuexActions from "./actions";
import VuexGetters from "./getters";
import VuexMutations from "./mutations";
import VuexModel from "./model";

Vue.use(Vuex);

export default new Vuex.Store({
  state: VuexModel,
  actions: VuexActions,
  getters: VuexGetters,
  mutations: VuexMutations
});
