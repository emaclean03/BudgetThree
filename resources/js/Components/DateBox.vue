<template>
  <div class="m-4 rounded border">
    {{ currentDate }}
  </div>
</template>

<script setup lang="ts">
const currentDate = new Date().toLocaleDateString();
</script>
