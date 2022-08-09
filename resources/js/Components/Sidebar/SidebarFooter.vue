<template>
  <div class="flex-shrink-0 px-3 lg:hidden">
    <Button 
      v-show="!sidebarState.isOpen" 
      v-slot="{ iconSizeClasses }" 
      icon-only 
      variant="secondary"
      type="button"
      :sr-text="sidebarState.isOpen ? 'Close sidebar' : 'Open sidebar'"
      @click="sidebarState.isOpen = !sidebarState.isOpen"
    >
      <MenuFoldLineLeftIcon 
        v-show="sidebarState.isOpen" 
        aria-hidden="true" 
        :class="[iconSizeClasses]"
      />

      <MenuFoldLineRightIcon 
        v-show="!sidebarState.isOpen"
        aria-hidden="true"  
        :class="[iconSizeClasses]"
      />
    </Button>
  </div>
</template>

<script setup>
import Button from '@/Components/Button.vue'
import { sidebarState } from '@/Composables'
</script>
