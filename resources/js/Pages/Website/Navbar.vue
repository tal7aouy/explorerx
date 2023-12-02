<script setup>
import { Link } from '@inertiajs/vue3';
const { canRegister, canLogin } = defineProps({
  canRegister: Boolean,
  canLogin: Boolean,
});
</script>
<template>
  <nav
    class="bg-white w-full flex relative justify-between items-center mx-auto px-8 h-20"
  >
    <!-- logo -->
    <div class="inline-flex">
      <a class="_o6689fn" href="/"
        ><div class="flex items-center">
          <img src="logo.png" class="w-8 h-8" alt="" />
          <h3 class="font-bold text-indigo-500">
            <span class="text-3xl font-semibold">E</span>xplorerX
          </h3>
        </div>
      </a>
    </div>

    <!-- end logo -->

    <!-- login -->
    <div class="flex-initial">
      <div class="flex justify-end items-center relative">
        <div class="mr-4 items-center hidden md:flex">
          <a
            class="inline-block py-2 px-3 hover:bg-gray-200 rounded-full"
            href="#"
          >
            <div
              class="flex items-center relative cursor-pointer whitespace-nowrap"
            >
              About Us
            </div>
          </a>
          <a
            class="inline-block py-2 px-3 hover:bg-gray-200 rounded-full"
            href="#"
          >
            <div
              class="flex items-center relative cursor-pointer whitespace-nowrap"
            >
              Contact Us
            </div>
          </a>
          <a
            class="inline-block py-2 px-3 hover:bg-gray-200 rounded-full"
            href="#"
          >
            <div
              class="flex items-center relative cursor-pointer whitespace-nowrap"
            >
              Our Story
            </div>
          </a>
          <div
            v-if="canLogin"
            class=""
          >
            <Link
              v-if="$page.props.auth.user"
              :href="route('dashboard')"
              class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
            >
              <div
                class="flex items-center relative cursor-pointer whitespace-nowrap"
              >
                Dashboard
              </div>
            </Link>

            <template v-else>
              <Link
                :href="route('login')"
                class="inline-block py-2 px-3 hover:bg-gray-200 rounded-full"
              >
                <div
                  class="flex items-center relative cursor-pointer whitespace-nowrap"
                >
                  Login
                </div></Link
              >

              <Link
                v-if="canRegister"
                :href="route('register')"
                class="inline-block py-2 px-3 hover:bg-gray-200 rounded-full"
                ><div
                  class="flex items-center relative cursor-pointer whitespace-nowrap"
                >
                  Register
                </div></Link
              >
            </template>
          </div>
        </div>

      </div>
    </div>
    <!-- end login -->
  </nav>
</template>
