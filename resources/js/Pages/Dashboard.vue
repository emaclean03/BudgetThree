<template>
  <AuthenticatedLayout title="Dashboard">
    <template #header>
      <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
        <h2 class="text-xl font-semibold leading-tight">
          Budgets
        </h2>
      </div>
    </template>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
      <div v-if="props.allBudgets.length > 0">
        <div
          v-for="budget in props.allBudgets"
          :key="budget.id"
        >
          <Button
            :variant="'primary'"
            type="button"
            class="hidden md:inline-flex m-2"
            :href="route('Budget.index', budget.id)"
          >
            {{ budget.budget_name }}
          </Button>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/Authenticated.vue';
import Button from '@/Components/Button.vue'
const budgetStore = useBudgetStore();

import {defineProps} from "vue";
import {useBudgetStore} from "@/Store/Budget/useBudgetStore";

interface Props {
  allBudgets:[{
    budget_name: string,
  }]
}

const props = defineProps<Props>()

budgetStore.budget_name = 'X'




</script>
