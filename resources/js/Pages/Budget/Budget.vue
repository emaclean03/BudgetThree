<template>
  <AuthenticatedLayout title="Dashboard">
    <template #header>
      <div class="flex flex-row items-center justify-between w-1/2">
        <DateBox />
        <div
          :class="amountToBudget >= 0 ? 'bg-green-600 p-2 text-white rounded-lg': 'bg-red-600 p-2 text-white rounded-lg'"
        >
          <p class="text-black">
            Amount to assign
          </p>
          <p class="text-center">
            ${{ amountToBudget }}
          </p>
        </div>
      </div>
    </template>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
      <div class="flex flex-row mb-4 -mt-4 rounded border-b-2 justify-evenly">
        <ActionBar />
      </div>
      <CategoryTable />
    </div>
  </AuthenticatedLayout>
</template>

<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/Authenticated.vue'
import {useBudgetStore} from "@/Store/Budget/useBudgetStore.js";
import {computed, onMounted} from "vue";
import {useAccountsStore} from "@/Store/Budget/useAccountsStore.js";
import CategoryTable from "@/Pages/Budget/CategoryTable.vue";
import {useCategoriesStore} from "@/Store/Budget/useCategoriesStore.js";
import ActionBar from "@/Components/Budget/ActionBar.vue";
import DateBox from "@/Components/DateBox.vue";
const budgetStore = useBudgetStore();
const accountsStore = useAccountsStore();
const categoriesStore = useCategoriesStore();

interface Props{
  budget:{
    budget_name: string,
    budget_id: number,
  },
  allAccounts:[{
    account_name: string,
    account_balance: number,
    id: number,
  }],
  allCategories:[{
    category_name: string,
    id: number,
  }],
  accountBalance: number,
  amountToBudget:number,
}

const props = defineProps<Props>()

const budget = computed(() => props.budget)
const accounts = computed(() => props.allAccounts)
const categories = computed(() => props.allCategories)

onMounted(() => {
//set our state for budgets
  budgetStore.budget_name = budget.value.budget_name
  budgetStore.budget_id = budget.value.budget_id
//accounts
  accountsStore.accounts = accounts.value;
//categories
  categoriesStore.categories = categories.value;
})


</script>
