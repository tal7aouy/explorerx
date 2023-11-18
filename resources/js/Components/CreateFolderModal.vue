
<script setup lang="ts">
import Modal from "@/Components/Modal.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import {useForm} from "@inertiajs/vue3";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import {nextTick, ref} from "vue";
const {modalValue} = defineProps<{modalValue:Boolean}>()
const form = useForm({
  name: ''
})
const folderInput = ref<any>()
const emit = defineEmits(['update:modelValue'])
const onShow = () => {
  nextTick(()=> folderInput.value.focus())
}
const submit = () => {
  form.post(route('folders.create'),{
    preserveScroll: true,
    onSuccess: () => {
      closeModal()
      form.reset()
    },
    onError: () => folderInput.value.focus()
  })
}

const closeModal = () => {
  emit('update:modelValue', false)
  form.clearErrors()
  form.reset()
}

</script>

<template>
<modal :show="modalValue" @show="onShow" @hide="onHide" max-width="sm">
 <div class="p-6">
   <h2 class="text-lg font-medium text-gray-600">
     Create Folder
   </h2>
   <div class="mt-6">
    <InputLabel for="folderName" value="Folder Name" class="sr-only"/>
     <TextInput
       id="folderName"
       type="text"
       ref="folderInput"
       class="mt-1 block w-full"
       v-model="form.name"
       required
       :class="form.errors.name ? 'bg-red-500 focus:border-red-500 focus:ring-red-500':''"
       placeholder="New Folder ..."
       @keyup.enter="submit"
     />
     <InputError class="mt-2" :message="form.errors.name" />
     <div class="flex mt-5 items-center justify-start space-x-1">
       <PrimaryButton @click="submit" :class="{'opacity-25':form.processing}" :disable="form.processing">
         Submit
       </PrimaryButton>
       <SecondaryButton @click.prevent="closeModal">
         Cancel
       </SecondaryButton>
     </div>
   </div>
 </div>
</modal>
</template>
