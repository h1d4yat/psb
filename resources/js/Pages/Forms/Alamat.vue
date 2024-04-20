<script setup>
import {
  computed,
  onMounted,
  onUpdated,
  reactive,
  ref,
  watch,
} from 'vue';

import axios from 'axios';

import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import Select from '@/Components/Select.vue';
import TextInput from '@/Components/TextInput.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import wilayah from '@/Utils/Wilayah.js';
import {
  useForm,
  usePage,
} from '@inertiajs/vue3';

import toast from '../../Utils/Toast.js';

const $page = usePage('data');

const kabupaten = ref(null);
const kecamatan = ref(null);
const desa = ref(null)

const data = useForm({
    ...$page.props.data
});

const reloadWilayah = async () =>{
    kabupaten.value = await wilayah.getKabupaten($page.props.data.provinsi);
    kecamatan.value = await wilayah.getKecamatan($page.props.data.kabupaten);
    desa.value = await wilayah.getDesa($page.props.data.kecamatan);
}

onMounted(async function(){
   reloadWilayah()
});

onUpdated(async function(){
    reloadWilayah();
})

const selectKabupaten = async function(e){
    kabupaten.value = await wilayah.getKabupaten(e.target.value);
}
const selectKecamatan = async function(e){
    kecamatan.value = await wilayah.getKecamatan(e.target.value);
}
const selectDesa = async function(e){
    desa.value = await wilayah.getDesa(e.target.value);
}


const simpan = computed(function(){
    data.post(route('form.alamat.simpan'),{
        onFinish:(e)=>{
            if ($page.props.errors.success) {
               toast.success($page.props.errors.success); 
            } else if($page.props.errors.error){
                toast.error($page.props.errors.success);
            }
        }
    })
});

</script>

<template>
    <AuthenticatedLayout title="Alamat">
        <template #header>Isi Alamat</template>
        <div class="p-4 bg-white rounded shadow-lg sm:p-8">
            <form @submit.prevent="simpan" action="" method="POST">
                <div class="flex flex-col gap-4">
                    <div class="grid grid-cols-3 gap-4">
                        <div class="">
                            <InputLabel>RT</InputLabel>
                            <TextInput v-model="data.rt" />
                        </div>
                        <div class="">
                            <InputLabel>RW</InputLabel>
                            <TextInput v-model="data.rw" />
                        </div>
                        <div class="">
                            <InputLabel>KODE POS</InputLabel>
                            <TextInput v-model="data.kode_pos" />
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="">
                            <InputLabel>DUSUN</InputLabel>
                            <TextInput v-model="data.dusun" />
                        </div>
                        <div class="">
                            <InputLabel>JALAN</InputLabel>
                            <TextInput v-model="data.jalan" />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div class="">
                            <InputLabel>PROPINSI</InputLabel>
                            <select v-model="data.provinsi" @change="selectKabupaten" class="w-full border-gray-200 rounded-lg shadow cursor-pointer">
                                <option v-for="i in $page.props.wilayah.provinsi" :value="i.id">{{ i.name }}</option>
                            </select>
                        </div>
                        <div class="">
                            <InputLabel>KABUPATEN / Kota</InputLabel>
                            <select v-model="data.kabupaten" @change="selectKecamatan" class="w-full border-gray-200 rounded-lg shadow cursor-pointer">
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
                            <select v-model="data.kecamatan" @change="selectDesa" class="w-full border-gray-200 rounded-lg shadow cursor-pointer">
                                <option  v-if="kecamatan" v-for="i in kecamatan" :value="i.id"> {{ i.type }} {{ i.name }}
                                </option>
                                <option v-else selected value="">
                                    Pilih Dulu Kabupaten
                                </option>
                            </select>
                        </div>
                        <div class="">
                            <InputLabel>DESA</InputLabel>
                            <select v-model="data.desa" class="w-full border-gray-200 rounded-lg shadow cursor-pointer">
                                <option v-if="desa" v-for="i in desa" :value="i.name"> {{ i.type }} {{ i.name }}</option>
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
