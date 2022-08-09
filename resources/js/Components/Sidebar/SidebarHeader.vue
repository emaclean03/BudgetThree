<template>
  <div class="flex items-center justify-between flex-shrink-0 px-3">
    <Link
      :href="route('dashboard')"
      class="inline-flex items-center gap-2"
    >
      <span class="sr-only">K-UI</span>
      <ApplicationLogo
        aria-hidden="true"
        class="w-10 h-auto"
      />
    </Link>

    <Button 
      v-show="sidebarState.isOpen || sidebarState.isHovered" 
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
        :class="['hidden lg:block', iconSizeClasses]"
      />

      <MenuFoldLineRightIcon 
        v-show="!sidebarState.isOpen"
        aria-hidden="true"  
        :class="['hidden lg:block', iconSizeClasses]"
      />

      <XIcon 
        aria-hidden="true" 
        :class="['lg:hidden', iconSizeClasses]"
      />
    </Button>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/inertia-vue3'
import ApplicationLogo from '@/Components/ApplicationLogo.vue'
import Button from '@/Components/Button.vue'
import { XIcon } from '@heroicons/vue/outline'
import { sidebarState } from '@/Composables'
</script>
