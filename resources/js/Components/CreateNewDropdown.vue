<template>
  <div class="">
    <Menu as="div" class="relative block text-left">
      <div>
        <MenuButton
          class="flex w-full justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50"
        >
          Create New
        </MenuButton>
      </div>

      <transition
        enter-active-class="transition duration-100 ease-out"
        enter-from-class="transform scale-95 opacity-0"
        enter-to-class="transform scale-100 opacity-100"
        leave-active-class="transition duration-75 ease-in"
        leave-from-class="transform scale-100 opacity-100"
        leave-to-class="transform scale-95 opacity-0"
      >
        <MenuItems
          class="absolute left-0 mt-2 w-32 origin-top-right w-full divide-y divide-gray-100 rounded-md bg-white shadow-lg ring-1 ring-black/5 focus:outline-none"
        >
          <div class="px-1 py-1">
            <MenuItem v-slot="{ active }">
              <a @click.prevent="createFolderModal()" class="text-gray-700 text-sm px-4 py-2 block cursor-pointer">New Folder</a>
            </MenuItem>
          </div>
          <div class="px-1 py-1">
            <MenuItem v-slot="{ active }">
              <a class="text-gray-700 cursor-pointer text-sm px-4 py-2 block"
                >Upload Folders</a
              >
            </MenuItem>
            <MenuItem v-slot="{ active }">
              <a class="text-gray-700 cursor-pointer text-sm px-4 py-2 block">Upload Files</a>
            </MenuItem>
          </div>
        </MenuItems>
      </transition>
    </Menu>
    <CreateFolderModal :modalValue="showModalView" @update:model-value="showModalView=false"/>
  </div>
</template>

<script setup lang="ts">
import {ref} from "vue";
import { Menu, MenuButton, MenuItems, MenuItem } from "@headlessui/vue";
import CreateFolderModal from "@/Components/CreateFolderModal.vue";

const showModalView = ref<Boolean>(false)
function createFolderModal(){
  showModalView.value = true
}
</script>
