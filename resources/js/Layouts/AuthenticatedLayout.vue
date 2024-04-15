<script setup>
import {
  onMounted,
  ref,
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
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        <div class="p-4 sm:ml-64">
        <div class="p-4 dark:border-gray-700 mt-14">
            <slot name="header"/>
            <slot />
        </div>
    </div>
    </div>


</template>
