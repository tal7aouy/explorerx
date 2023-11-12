<script setup lang="ts">
import Navigation from "@/Components/Navigation.vue";
import SearchForm from "@/Components/SearchForm.vue";
import UserDropdownSetting from "@/Components/UserDropdownSetting.vue";
</script>
<template>
  <div class="h-screen bg-gray-50 flex w-full gap-4">
    <Navigation />
    <main class="flex flex-col flex-1 px-4 overflow-hidden">
      <div class="flex items-center justify-between w-full">
        <SearchForm />
        <UserDropdownSetting />
      </div>
      <div class="flex flex-col flex-1 overflow-hidden">
        <slot />
      </div>
    </main>
  </div>
</template>;
