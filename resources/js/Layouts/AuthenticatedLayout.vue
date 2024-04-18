<script setup>
import {
  onMounted,
  ref,
  useSlots,
} from 'vue';

import { initFlowbite } from 'flowbite';

import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link } from '@inertiajs/vue3';

import User from './Part/Menu/User.vue';
import Navbar from './Part/Navbar.vue';
import Sidebar from './Part/Sidebar.vue';

const slot = useSlots();
const showingNavigationDropdown = ref(false);
onMounted(function () {
    initFlowbite();
});
</script>

<template>
    <Navbar />
    <Sidebar>
        <User/>
    </Sidebar>
    <div class="">
        <div class="p-3 mt-3 sm:px-6 sm:mt-4 sm:ml-64">
        <div class="dark:border-gray-700 mt-14">
            <h2 v-if="slot.header" class="mb-4 text-xl font-semibold leading-tight text-gray-800">
                <slot name="header"/>
            </h2>
            <slot />
        </div>
    </div>
    </div>


</template>
