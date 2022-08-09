<template>
  <PerfectScrollbar
    v-if="budgetStore.budget_name !== 'X'"
    tagname="nav"
    aria-label="main"
    class="relative flex flex-col flex-1 max-h-full gap-4 px-3"
  >
    <hr>
    <SidebarCollapsible
      title="Budget"
      :active="route().current('components.*')"
    >
      <template #icon>
        <TemplateIcon
          class="flex-shrink-0 w-6 h-6"
          aria-hidden="true"
        />
      </template>

      <SidebarCollapsibleItem
        href="#"
        title="Buttons"
        :active="route().current('components.buttons')"
      />
    </SidebarCollapsible>

    <hr>

    <SidebarCollapsible
      title="Accounts"
      :active="route().current('components.*')"
    >
      <template #icon>
        <TemplateIcon
          class="flex-shrink-0 w-6 h-6"
          aria-hidden="true"
        />
      </template>

      <SidebarCollapsibleItem
        v-for="account in accountsStore.accounts"
        :href="route('Account.show', account.id)"
        :title="account.account_name + ' - $' + account.account_balance"
        :active="route().current('Account.show', account.id)"
      />
    </SidebarCollapsible>

    <!-- Examples -->
    <!-- 
        => External link example
        <SidebarLink
            title="Github"
            href="https://github.com/kamona-wd/kui-laravel-breeze"
            external
            target="_blank"
        >
        </SidebarLink>

        => Collapsible examples
        <SidebarCollapsible title="Users" :active="$page.url.startsWith('/users')">
            <SidebarCollapsibleItem :href="route('users.index')" title="List" :active="$page.url === '/users/index'" />
            <SidebarCollapsibleItem :href="route('users.create')" title="Create" :active="$page.url === '/users/create'" />
        </SidebarCollapsible>

        <SidebarCollapsible title="Users" :active="usePage().url.value.startsWith('/users')">
            <template #icon>
                <UserIcon
                    class="flex-shrink-0 w-6 h-6"
                    aria-hidden="true"
                />
            </template>

            <SidebarCollapsibleItem :href="route('users.index')" title="List" :active="route().current('users.index')" />
            <SidebarCollapsibleItem :href="route('users.create')" title="Create" :active="route().current('users.create')" />
        </SidebarCollapsible>-->
  </PerfectScrollbar>
</template>

<script setup lang="ts">
import PerfectScrollbar from '@/Components/PerfectScrollbar.vue'
import SidebarCollapsible from '@/Components/Sidebar/SidebarCollapsible.vue'
import SidebarCollapsibleItem from '@/Components/Sidebar/SidebarCollapsibleItem.vue'
import { TemplateIcon } from "@heroicons/vue/outline";
import {useBudgetStore} from "@/Store/Budget/useBudgetStore";
import {useAccountsStore} from "@/Store/Budget/useAccountsStore";

const budgetStore = useBudgetStore();
const accountsStore = useAccountsStore();

console.log('sidebar', budgetStore.budget_name)
</script>
