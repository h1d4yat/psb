<script setup>
import { ref } from 'vue';

import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import Select from '@/Components/Select.vue';
import TextInput from '@/Components/TextInput.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

const jenis_kelamin = ref([
    {
        key: "L",
        value: "Laki Laki"
    },
    {
        key: "P",
        value: "Perempuan"
    },

])
const golongan_darah = ref([
    {
        key: "A",
        value: "A"
    },
    {
        key: "B",
        value: "B"
    },
    {
        key: "AB",
        value: "AB"
    },
    {
        key: "O",
        value: "O"
    },

])
</script>
<template>
    <AuthenticatedLayout>
        <div class="bg-white p-8 rounded shadow-sm">
            <form action="" class="space-y-4">
                <div class="flex items-center gap-3">
                    <div class="w-full">
                        <InputLabel>NISN</InputLabel>
                        <TextInput placeholder="Ketikan nisn (No induk siswa nasional)" type="number" />
                    </div>
                    <div class="w-full">
                        <InputLabel>NIK</InputLabel>
                        <TextInput placeholder="Ketikan nik (No induk kependudukan)" type="number" />
                    </div>
                </div>
                <div class="">
                    <InputLabel>Nama</InputLabel>
                    <TextInput placeholder="Ketikan nama anda" :value="$page.props.auth.user.name" />
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="">
                        <InputLabel>Jenis Kelamin</InputLabel>
                        <Select label="Jenis kelamin"  :items="jenis_kelamin" />
                    </div>
                    <div class="">
                        <InputLabel>Agama</InputLabel>
                        <Select label="agama" :items="jenis_kelamin" />
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="">
                        <InputLabel>Tempat Lahir</InputLabel>
                        <TextInput placeholder="Tempat lahir" type="text" />
                    </div>
                    <div class="">
                        <InputLabel>Tanggal Lahir</InputLabel>
                        <TextInput type="date" />
                    </div>
                </div>
                <div class="">
                    <InputLabel>Golongan Darah</InputLabel>
                    <Select :items="golongan_darah" />
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <div class="">
                        <InputLabel>No Telp</InputLabel>
                        <TextInput type="tel" />
                    </div>
                    <div class="">
                        <InputLabel>Email</InputLabel>
                        <TextInput type="email" />
                    </div>
                </div>
                <div class="">
                    <InputLabel>Hobi</InputLabel>
                    <TextInput type="tel" />
                </div>
                <div class="">
                    <InputLabel>Cita Cita</InputLabel>
                    <TextInput type="tel" />
                </div>
                <div class="grid grid-cols-3 gap-3">
                    <div class="">
                        <InputLabel>No KIP</InputLabel>
                        <TextInput type="text" />
                    </div>
                    <div class="">
                        <InputLabel>No KIS</InputLabel>
                        <TextInput type="text" />
                    </div>
                    <div class="">
                        <InputLabel>No KKS</InputLabel>
                        <TextInput type="text" />
                    </div>
                </div>
                <div class="">
                    <InputLabel>No SKTM</InputLabel>
                    <TextInput type="text" />
                </div>
                <div class="">
                    <InputLabel>Pas Foto</InputLabel>
                    <TextInput type="file" />
                </div>
                <PrimaryButton>SIMPAN</PrimaryButton>
            </form>
        </div>
    </AuthenticatedLayout>
</template>