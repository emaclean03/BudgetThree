import { defineStore } from 'pinia'

interface IUseCategoriesStore{
    categories:[{
        category_name: string,
        category_amount_assigned: number,
        category_amount_activity: number,
        category_amount_available: number,
        id: number,
    }]

}

export const useCategoriesStore = defineStore('categoriesStore', {
    state: (): IUseCategoriesStore => ({
        categories:[{
            category_name: '',
            category_amount_assigned: 0,
            category_amount_activity: 0,
            category_amount_available: 0,
            id: 0,
        }]
    })
})