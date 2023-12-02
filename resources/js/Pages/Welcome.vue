<script setup>
import Navbar from './Website/Navbar.vue';
import Hero from './Website/Hero.vue';
import { Head, Link } from '@inertiajs/vue3';
defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    }
});
</script>

<template>
    <Head title="Welcome" />
    <div class="min-w-full min-h-screen flex flex-col">
      <Navbar :can-login="canLogin" :can-register="canRegister" />
      <Hero />
    </div>
</template>
