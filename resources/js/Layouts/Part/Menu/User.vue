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
        <MenuLink :href="route('form.new')" :active="route().current('form.new')">
            <template #icon><i class="pi pi-file"></i></template>
            Pendaftaran
        </MenuLink>
        <MenuLink href="asu" badge="2">
            <template #icon><i class="pi pi-bell"></i></template>
            Pengumuman
        </MenuLink>
        <MenuLink href="asu" badge="9+">
            <template #icon><i class="pi pi-send"></i></template>
            Pesan
        </MenuLink>
        <MenuHeader>Seleksi</MenuHeader>
      </ul>
</template>