import { defineStore } from 'pinia'

interface IUseAccountsStore{
    accounts:[{
        account_name: string,
        id: number,
    }]

}

export const useAccountsStore = defineStore('accountsStore', {
    state: (): IUseAccountsStore => ({
       accounts:[{
           account_name: '',
           id: 0,
       }]
    })
})