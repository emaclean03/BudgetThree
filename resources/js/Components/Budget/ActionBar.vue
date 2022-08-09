<template>
  <div
    v-for="button in buttons"
    class=""
  >
    {{ button }}
  </div>
</template>

<script setup lang="ts">
import {ref} from "vue";

  const buttons = ref([
      'Add Category',
      'Add name',
      'Add test',
      'Add test',
      'Add test',
      'Add test',
  ])

</script>
