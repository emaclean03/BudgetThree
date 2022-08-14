import { defineStore } from 'pinia'

interface IUseBudgetStore{
        budget_id: number,
        budget_name: string,
}

export const useBudgetStore = defineStore('budgetStore', {
    state: (): IUseBudgetStore => ({
           budget_id: 0,
           budget_name: '',
    })
})