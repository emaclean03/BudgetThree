import { defineStore } from 'pinia'

interface IUseCategoriesStore{
    categories:[{
        category_name: string,
        id: number,
    }]

}

export const useCategoriesStore = defineStore('categoriesStore', {
    state: (): IUseCategoriesStore => ({
        categories:[{
            category_name: '',
            id: 0,
        }]
    })
})