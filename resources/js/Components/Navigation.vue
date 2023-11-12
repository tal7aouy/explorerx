<script setup lang="ts">
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import { Link } from "@inertiajs/vue3";
import CreateNewDropdown from "./CreateNewDropdown.vue";
import NavLink from "./NavLink.vue";
</script>

<template>
  <nav class="min-w-[200px]">
    <div class="h-[80px] px-3 flex items-center gap-3">
      <Link
        :href="route('files.index')"
        class="flex items-center space-x-1 text-indigo-500 font-bold"
      >
        <ApplicationLogo
          class="block h-7 w-auto fill-current text-indigo-800"
        />
        Forge
      </Link>
    </div>
    <div class="px-3">
      <CreateNewDropdown />
      <div class="py-3">
        <NavLink :href="route('files.index')" :active="route('files.index')"
          >Files</NavLink
        >
        <NavLink href="/">Shared Files</NavLink>
        <NavLink href="/">Shared by Me</NavLink>
        <NavLink href="/">Trash</NavLink>
      </div>
    </div>
  </nav>
</template>

