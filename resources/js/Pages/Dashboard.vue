<script setup>
import PrimaryButton from '@/Components/PrimaryButton.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>

    <Head title="Dashboard" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">Dashboard</h2>
        </template>
        <div class="mt-4 overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:shadow-lg sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h1 class="text-2xl font-bold">
                    Selamat Datang di Sistem Pendaftaran Mahasiswa Baru
                    <br />
                    {{ $page.props.auth.user.name }} 👋
                </h1>
                <p v-if="true">
                    Apakah anda akan mendaftar sebagai mahasiswa baru?
                    silahkan klik tombol dibawah ini.
                </p>
                <p v-else>Silahkan lanjut mengisi form pendaftaran.</p>
                <div class="flex justify-start mt-4">
                    <PrimaryButton>Buat Formulir</PrimaryButton>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
