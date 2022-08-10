<template>
  <n-button
    tertiary
    type="primary"
    @click="showModal = true"
  >
    Add Category
  </n-button>

  <n-modal
    v-model:show="showModal"
    class="custom-card rounded-lg dark:bg-dark-bg dark:text-gray-100"
    preset="dialog"
    :style="bodyStyle"
    :bordered="true"
    size="huge"
    positive-text="Submit"
    negative-text="Cancel"
    @positive-click="submitCallback"
    @negative-click="() => !!showModal"
  >
    <Input
      v-model="categoryName"
      placeholder="Category name"
      type="text"
    />
    <template #footer>
      Footer
    </template>
  </n-modal>
</template>

<script setup lang="ts">
import {ref} from "vue";
import {NButton, NModal} from 'naive-ui'
import {Inertia} from "@inertiajs/inertia";
import Input from "@/Components/Input.vue";
import {useBudgetStore} from "@/Store/Budget/useBudgetStore";

const showModal = ref(false);
const categoryName = ref('')
const budgetStore = useBudgetStore();

const submitCallback = () => {
  Inertia.post(`/category/${budgetStore.budget_id}/store`,
      {category_name: categoryName.value},
      {preserveState: false});
}


const bodyStyle = {
  width: '600px'
}

</script>
