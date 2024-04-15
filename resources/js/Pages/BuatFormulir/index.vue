<script setup>
import {
  ref,
  useSlots,
} from 'vue';

import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import Select from '@/Components/Select.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

const slots = useSlots();
const items = ref([
    {
        key: "",
        value: "---Pilih Jalur Pendaftaran---",
        selected: true,
    },
    {
        key: "GEL2",
        value: "GEL2",
        selected: false,
    },
    {
        key: "GEL3",
        value: "GEL3",
        selected: false,
    }
]);
const jenis_pendaftaran = ref([
    {
        key: "",
        value: "---Pilih Jenis Pendaftaran---",
        selected: true,
    },
    {
        key: "baru",
        value: "Baru",
        selected: false,
    },
    {
        key: "pindahan",
        value: "Pindahan",
        selected: false,
    }
]);

const user = ref({
    jurusan_id: "",
    jalur_pendaftaran_id: "",
    jenis_pendaftaran: ""
})

</script>
<template>
    <AuthenticatedLayout>
        <template #header>
            Dashboard
        </template>
        <div class="p-8 bg-white rounded-lg shadow-lg">
            <form action="" class="flex flex-col items-end justify-end space-y-3">
                <div class="grid w-full grid-cols-1 gap-4 sm:grid-cols-3">
                    <div class="">
                        <InputLabel>Jalur Pendaftaran</InputLabel>
                        <Select v-model="user.jurusan_id" :items="items" label="Pilih jaur pendaftaran" />
                    </div>
                    <div class="">
                        <InputLabel>Jurusan</InputLabel>
                        <Select v-model="user.jalur_pendaftaran_id" :items="items" label="Pilih jaur pendaftaran" />
                    </div>

                    <div class="">
                        <InputLabel>Jenis Pendftaran</InputLabel>
                        <Select v-model="user.jenis_pendaftaran" :items="jenis_pendaftaran"
                            label="Pilih jaur pendaftaran" />
                    </div>
                </div>
                <PrimaryButton v-if="user.jalur_pendaftaran_id && user.jurusan_id && user.jenis_pendaftaran">Lanjutkan</PrimaryButton>
                <SecondaryButton v-else>Lanjutkan</SecondaryButton>
            </form>
        </div>
    </AuthenticatedLayout>
</template>