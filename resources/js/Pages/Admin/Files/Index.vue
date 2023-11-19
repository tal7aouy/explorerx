<script setup lang="ts">
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Head} from "@inertiajs/vue3";

const {files} = defineProps<{ files: Array<any> }>()

</script>

<template>
  <Head title="Files"/>

  <AuthenticatedLayout>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div
          class="bg-white  overflow-hidden shadow-sm sm:rounded-lg"
        >
          <div class="p-6 text-gray-900 ">
            <table class="min-w-full table">
              <thead class="bg-gray-100 border-b">
              <tr>
                <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Name</th>
                <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Owner</th>
                <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Last Modified</th>
                <th class="text-sm font-medium text-gray-900 px-6 py-4 text-left">Size</th>
              </tr>
              </thead>
              <tbody>
              <tr v-for="file in files.data" :key="file.id"
                  class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                  {{ file.name }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                  {{ file.owner }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                  {{ file.updated_at }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                  {{ file.size }}
                </td>
              </tr>
              </tbody>
            </table>
            <div v-if="!files.data.length" class="py-8 text-center text-lg">
              No files found.
            </div>
          </div>
        </div>
    </div>
    </div>
  </AuthenticatedLayout>
</template>
