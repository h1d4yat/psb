<script setup>
import {
  reactive,
  ref,
} from 'vue';

import axios from 'axios';

import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import Select from '@/Components/Select.vue';
import TextInput from '@/Components/TextInput.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

const kabupaten = ref(null);
const kecamatan = ref(null);
const desa = ref(null)
function getKabupaten(e) {
    const prov_id = e.target.value;
    axios.get(`/api/wilayah/kabupaten/${prov_id}`).then(function (e) {
        kabupaten.value = e.data.data;
    });
    kecamatan.value = null;
    kabupaten.value = null;
    desa.value = null;
}
function getKecamatan(e) {
    const kab_id = e.target.value;
    axios.get(`/api/wilayah/kecamatan/${kab_id}`).then(function (e) {
        kecamatan.value = e.data.data;
    });
    kecamatan.value = null;
    desa.value = null;
}
function getDesa(e) {
    const kec_id = e.target.value;
    axios.get(`/api/wilayah/desa/${kec_id}`).then(function (e) {
        desa.value = e.data.data;
    });

}
</script>

<template>
    <AuthenticatedLayout title="Alamat">
        <template #header>Isi Alamat</template>
        <div class="p-4 bg-white rounded shadow-lg sm:p-8">
            <form action="">
                <div class="flex flex-col gap-4">
                    <div class="grid grid-cols-3 gap-4">
                        <div class="">
                            <InputLabel>RT</InputLabel>
                            <TextInput />
                        </div>
                        <div class="">
                            <InputLabel>RW</InputLabel>
                            <TextInput />
                        </div>
                        <div class="">
                            <InputLabel>KODE POS</InputLabel>
                            <TextInput />
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="">
                            <InputLabel>DUSUN</InputLabel>
                            <TextInput />
                        </div>
                        <div class="">
                            <InputLabel>JALAN</InputLabel>
                            <TextInput />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div class="">
                            <InputLabel>PROPINSI</InputLabel>
                            <select @change="getKabupaten" class="w-full border-gray-200 rounded-lg shadow cursor-pointer">
                                <option v-for="i in $page.props.wilayah.provinsi" :value="i.id">{{ i.name }}</option>
                            </select>
                        </div>
                        <div class="">
                            <InputLabel>KABUPATEN / Kota</InputLabel>
                            <select @change="getKecamatan" class="w-full border-gray-200 rounded-lg shadow cursor-pointer">
                                <option v-if="kabupaten" v-for="i in kabupaten" :value="i.id"> {{ i.type }} {{ i.name }}
                                </option>
                                <option v-else selected value="">
                                    Pilih Dulu Provinsi
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div class="">
                            <InputLabel>KECAMATAN</InputLabel>
                            <select @change="getDesa" class="w-full border-gray-200 rounded-lg shadow cursor-pointer">
                                <option v-if="kecamatan" v-for="i in kecamatan" :value="i.id"> {{ i.type }} {{ i.name }}
                                </option>
                                <option v-else selected value="">
                                    Pilih Dulu Kabupaten
                                </option>
                            </select>
                        </div>
                        <div class="">
                            <InputLabel>DESA</InputLabel>
                            <select class="w-full border-gray-200 rounded-lg shadow cursor-pointer">
                                <option v-if="desa" v-for="i in desa" :value="i.id"> {{ i.type }} {{ i.name }}</option>
                                <option v-else selected value="">
                                    Pilih Dulu Kecamatan
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
                <PrimaryButton class="mt-4">SIMPAN</PrimaryButton>
            </form>
        </div>
    </AuthenticatedLayout>
</template>
