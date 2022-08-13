<template>
  <AuthenticatedLayout title="Dashboard">
    <template #header>
      <div class="flex items-start flex-row items-start justify-between w-1/2">
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
      <hr class="mt-2">
    </template>
    <div class="flex  flex-row -mt-6 mb-1 rounded border-b-2 justify-start">
      <ActionBar />
    </div>
    <div class=" overflow-auto p-6 bg-white rounded-md shadow-md dark:bg-dark-eval-1">
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

interface Props {
  budget: {
    budget_name: string,
    id: number,
  },
  allAccounts: [{
    account_name: string,
    account_balance: number,
    id: number,
  }],
  allCategories: [{
    category_name: string,
    category_amount_assigned: number,
    category_amount_activity: number,
    category_amount_available: number,
    id: number,
  }],
  accountBalance: number,
  amountToBudget: number,
}

const props = defineProps<Props>()

const budget = computed(() => props.budget)
const accounts = computed(() => props.allAccounts)
const categories = computed(() => props.allCategories)

onMounted(() => {
//set our state for budgets
  budgetStore.budget_name = budget.value.budget_name
  budgetStore.budget_id = budget.value.id
//accounts
  accountsStore.accounts = accounts.value;
//categories
  categoriesStore.categories = categories.value;
})


</script>
