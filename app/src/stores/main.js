import { defineStore } from 'pinia'

export const useMainStore = defineStore('main', {
  state: () => ({
    isLogin: false
  }),

  getters: {
    getFlagLogin: state => state.isLogin
  },

  actions: {
    setFlagLogin () {
      this.isLogin = true
    }
  }
})
