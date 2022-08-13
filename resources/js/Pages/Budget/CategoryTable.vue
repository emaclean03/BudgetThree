<template>
  <div class="flex flex-col h-[67vh]">
    <div class="p-1.5 w-full inline-block align-middle ">
      <div class="border rounded-lg ">
        <table class="min-w-full divide-y">
          <thead class="bg-gray-50">
            <tr>
              <th
                scope="col"
                class="px-6 py-3 text-xs font-bold text-left text-gray-500 uppercase"
              >
                Category
              </th>
              <th
                scope="col"
                class="px-6 py-3 text-xs font-bold text-left text-gray-500 uppercase"
              >
                Assigned
              </th>
              <th
                scope="col"
                class="px-6 py-3 text-xs font-bold text-left text-gray-500 uppercase"
              >
                Activity
              </th>
              <th
                scope="col"
                class="px-6 py-3 text-xs font-bold text-right text-gray-500 uppercase"
              >
                Available
              </th>
            </tr>
          </thead>
          <tbody class="divide-y  divide-gray-200">
            <tr
              v-for="category in categoriesStore.categories"
              :key="category.id"
            >
              <td
                class="px-6 py-4 text-sm font-medium whitespace-nowrap"
              >
                <Input
                  :model-value="category.category_name"
                  type="text"
                  class="border-0"
                  @blur="(e) => updateCategory(category.id, e.target.value, 'category_name')"
                  @keyup.enter="$event.target.blur()"
                />
              </td>
              <td
                class="px-6 py-4 text-sm whitespace-nowrap"
              >
                <Input
                  :model-value="category.category_amount_assigned"
                  type="text"
                  @blur="(e) => updateCategory(category.id, e.target.value, 'category_amount_assigned')"
                  @keyup.enter="$event.target.blur()"
                />
              </td>
              <td
                class="px-6 py-4 text-sm whitespace-nowrap"
              >
                {{ category.category_amount_activity }}
              </td>
              <td
                class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap"
              >
                <a
                  class="text-green-500 hover:text-green-700"
                  href="#"
                >
                  {{ category.category_amount_available }}
                </a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import 'vue3-easy-data-table/dist/style.css';
import {useCategoriesStore} from "@/Store/Budget/useCategoriesStore.js";
import Input from "@/Components/Input.vue";
import {Inertia} from "@inertiajs/inertia";

const categoriesStore = useCategoriesStore();

const updateCategory = (id:number, value:number, target:string) => {
  Inertia.post(`/category/${id}/update`, {id: id, value:value, target:target})
}

</script>
