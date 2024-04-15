<script setup>
import MenuHeader from '@/Components/MenuHeader.vue';
import MenuLink from '@/Components/MenuLink.vue';
import { Link } from '@inertiajs/vue3';
</script>
<template>
     <ul class="space-y-2 font-medium">
        <MenuHeader>Menu Utama</MenuHeader>
        <MenuLink :href="route('dashboard')" :active="route().current('dashboard')">
            <template #icon><i class="pi pi-home"></i></template>
            Dashboard
        </MenuLink>
        <MenuLink href="pendaftaran">
            <template #icon><i class="pi pi-file"></i></template>
            Pendaftaran
        </MenuLink>
        <MenuLink href="asu">
            <template #icon><i class="pi pi-bell"></i></template>
            Pengumuman
        </MenuLink>
        <MenuHeader>Seleksi</MenuHeader>
      </ul>
</template>