<script setup>
import {
  computed,
  ref,
  useSlots,
} from 'vue';

import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import Select from '@/Components/Select.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {
  useForm,
  usePage,
} from '@inertiajs/vue3';

import Detail from './Partials/Detail.vue';

const props = usePage();
const slots = useSlots();

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

const user = useForm({
    jurusan_id: ref(''),
    jalur_pendaftaran_id: ref(''),
    jenis_pendaftaran: ref('')
})

const loading = ref(false);

const simpan = computed(function(){
    user.post(route('form.simpan_baru'),{
        onStart:()=>{
            loading.value = true
        },
        onFinish:()=>{
            loading.value = false
        }
    });
});
</script>
<template>
    <AuthenticatedLayout>
        
        <template #header>
            Dashboard
        </template>
        <div v-if="!$page.props.haveForm" class="p-8 bg-white rounded-lg shadow-lg">
            <form @submit.prevent="simpan" action="" class="flex flex-col items-end justify-end space-y-3">
                <div class="grid w-full grid-cols-1 gap-4 sm:grid-cols-3">
                    <div class="">
                        <InputLabel>Jalur Pendaftaran</InputLabel>
                        <Select :error="$page.props.errors.jalur_pendaftaran_id != null" v-model="user.jalur_pendaftaran_id" :items="$page.props.jalur_pendaftarans" label="Pilih jaur pendaftaran" />
                        <InputError :message="$page.props.errors.jalur_pendaftaran_id"/>
                    </div>
                    <div class="">
                        <InputLabel>Jurusan</InputLabel>
                        <Select :error="$page.props.errors.jurusan_id != null" v-model="user.jurusan_id" :items="$page.props.jurusans" label="Pilih Jurusan" />
                        <InputError :message="$page.props.errors.jurusan_id"/>

                    </div>

                    <div class="">
                        <InputLabel>Jenis Pendftaran</InputLabel>
                        <Select
                        :error="$page.props.errors.jenis_pendaftaran != null"
                        v-model="user.jenis_pendaftaran" :items="jenis_pendaftaran"
                            label="Pilih jaur pendaftaran" />
                            <InputError :message="$page.props.errors.jenis_pendaftaran"/>

                    </div>
                </div>
              
                <div class="flex items-center justify-start gap-1">
                    <PrimaryButton >Lanjutkan</PrimaryButton>
                    <span class="block" v-if="loading">Loading</span>
                </div>
            </form>
        </div>
        <div class="p-8 bg-white rounded-lg shadow-lg">
            <Detail/>
        </div>
    </AuthenticatedLayout>
</template>