import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    mobActiveTab : ''
  },
  getters:{
    currentMobTab: state => state.mobActiveTab
  },
  mutations: {
    UPDATE_NAVTAB(state, tabName){
      state.mobActiveTab = tabName
    }
  },
  actions: {
    update_navTab({commit}, tabName){
      commit('UPDATE_NAVTAB', tabName)
    }
  }
})
