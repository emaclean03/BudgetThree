<template>
  <AuthenticatedLayout title="Dashboard">
    <template #header>
      <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
        <h2 class="text-xl font-semibold leading-tight">
          Dashboard
        </h2>
      </div>
    </template>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
      <CategoryTable />
    </div>
  </AuthenticatedLayout>
</template>

<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/Authenticated.vue'
import {useBudgetStore} from "@/Store/useBudgetStore";
import {computed} from "vue";
import {useAccountsStore} from "@/Store/useAccountsStore";
import CategoryTable from "@/Pages/Budget/CategoryTable.vue";
const budgetStore = useBudgetStore();
const accountsStore = useAccountsStore();

interface Props{
  budget:{
    budget_name: string,
    budget_id: number,
  },
  allAccounts:[{
    account_name: string,
    id: number,
  }]
}

const props = defineProps<Props>()

const budget = computed(() => props.budget)
const accounts = computed(() => props.allAccounts)

//set our state for budgets
budgetStore.budget_name = budget.value.budget_name
budgetStore.budget_id = budget.value.budget_id
//accounts
accountsStore.accounts = accounts.value;

</script>
