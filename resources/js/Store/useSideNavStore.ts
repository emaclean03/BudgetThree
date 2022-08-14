import { defineStore } from 'pinia'

export const useSideNavStore = defineStore('sideNav', {
  state: () => ({
     allBudgets: [{
         id: 1,
         budget_name: 'test123 from pinia'
     }],
  }),
})