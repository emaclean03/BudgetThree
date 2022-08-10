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
      'Button 2',
      'Button 3',
      'Button 4',
      'Button 5',
      'Button 5',
  ])

</script>
