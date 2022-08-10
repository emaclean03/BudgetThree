<template>
  <DataTable
    :headers="headers"
    :items="categoriesStore.categories"
  />
</template>

<script setup lang="ts">
import DataTable from 'vue3-easy-data-table';
import 'vue3-easy-data-table/dist/style.css';
import type { Header } from "vue3-easy-data-table";
import {useCategoriesStore} from "@/Store/Budget/useCategoriesStore.js";

const categoriesStore = useCategoriesStore();

const headers: Header[] = [
  { text: "Category", value: "category_name" },
  { text: "Assigned", value: "category_amount_assigned", sortable: true },
  { text: "Activity", value: "category_amount_activity", sortable: true },
  { text: "Available", value: "category_amount_available", sortable: true }
];


</script>
