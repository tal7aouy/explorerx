<script lang="ts" setup>
import TextInput from "./TextInput.vue";
import { useForm } from "@inertiajs/vue3";
const form = useForm({
  search: "",
});
</script>
<template>
  <form action="" class="w-[600px] h-[80px] flex items-center">
    <TextInput
      type="text"
      class="block w-full mr-2"
      v-model="form.search"
      autocomplete
      placeholder="Search for files and folders"
    />
  </form>
</template>
