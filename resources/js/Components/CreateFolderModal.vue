<script setup lang="ts">
import Modal from "@/Components/Modal.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import {useForm, usePage} from "@inertiajs/vue3";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import {nextTick, ref} from "vue";

const page = usePage()
const {modalValue} = defineProps<{ modalValue: Boolean }>()
const form = useForm({
  name: '',
  parent_id: page.props.folder.id
})
const folderInput = ref<any>()
const emit = defineEmits(['update:modelValue'])
const onShow = () => {
  nextTick(() => folderInput.value.focus())
}

const submit = () => {
  form.post(route('folders.create'), {
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
  <modal :show="modalValue" max-width="sm" @hide="onHide" @show="onShow">
    <div class="p-6">
      <h2 class="text-lg font-medium text-gray-600">
        Create Folder
      </h2>
      <div class="mt-6">
        <InputLabel class="sr-only" for="folderName" value="Folder Name"/>
        <TextInput
          id="folderName"
          ref="folderInput"
          v-model="form.name"
          :class="form.errors.name ? 'bg-red-500 focus:border-red-500 focus:ring-red-500':''"
          class="mt-1 block w-full"
          placeholder="New Folder ..."
          required
          type="text"
          @keyup.enter="submit"
        />
        <InputError :message="form.errors.name" class="mt-2"/>
        <div class="flex mt-5 items-center justify-start space-x-1">
          <PrimaryButton :class="{'opacity-25':form.processing}" :disable="form.processing" @click="submit">
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
