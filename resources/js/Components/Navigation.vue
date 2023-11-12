<script setup lang="ts">
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import { Link } from "@inertiajs/vue3";
import CreateNewDropdown from "./CreateNewDropdown.vue";
import NavLink from "./NavLink.vue";
</script>

<template>
  <nav class="min-w-[200px]">
    <div class="h-[80px] px-3 flex items-center gap-3">
      <Link href="/">
        <ApplicationLogo
          class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200"
        />
      </Link>
      LaraStorage
    </div>
    <div class="px-3">
      <CreateNewDropdown />
      <div class="py-3">
        <NavLink href="/" :active="true">Files</NavLink>
        <NavLink href="/">Shared Files</NavLink>
        <NavLink href="/">Shared by Me</NavLink>
        <NavLink href="/">Trash</NavLink>
      </div>
    </div>
  </nav>
</template>

