<template>
  <div class="flex items-center justify-between flex-shrink-0 px-3">
    <SidebarCollapsible
      :title="budgetStore.budget_name"
      :active="route().current('components.*')"
    >
      <template #icon>
        <TemplateIcon
          class="flex-shrink-0 w-6 h-6"
          aria-hidden="true"
        />
      </template>
      <SidebarCollapsibleItem
        title="Budgets"
        :href="route('dashboard')"
        :active="route().current('dashboard')"
      />
    </SidebarCollapsible>

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
import SidebarCollapsible from '@/Components/Sidebar/SidebarCollapsible.vue'
import SidebarCollapsibleItem from '@/Components/Sidebar/SidebarCollapsibleItem.vue'
import {useBudgetStore} from "@/Store/useBudgetStore";

const budgetStore = useBudgetStore();
</script>
