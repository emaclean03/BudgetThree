import { defineStore } from 'pinia'

interface IUseAccountsStore{
    accounts:[{
        account_name: string,
        account_balance:number,
        id: number,
    }]

}

export const useAccountsStore = defineStore('accountsStore', {
    state: (): IUseAccountsStore => ({
       accounts:[{
           account_name: '',
           account_balance: 0,
           id: 0,
       }]
    })
})