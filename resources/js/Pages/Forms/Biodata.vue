<script setup>
import {
  computed,
  ref,
} from 'vue';

import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import Select from '@/Components/Select.vue';
import TextInput from '@/Components/TextInput.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import toast from '@/Utils/Toast';
import {
  useForm,
  usePage,
} from '@inertiajs/vue3';

import UploadCare from './Partials/UploadCare.vue';

const jenis_kelamin = ref([
    {
        key: "L",
        value: "Laki Laki",
    },
    {
        key: "P",
        value: "Perempuan",
    },
]);
const tempat_tinggal = ref([
    {
        key: "Sama Orang Tua",
        value: "Sama Orang Tua",
    },
    {
        key: "Kos",
        value: "Ngekos",
    },
    {
        key: "Sama Nenek",
        value: "Sama Nenek",
    },
    {
        key: "Sama Kakak",
        value: "Sama Kakak",
    },
    {
        key: "Asrama",
        value: "Asrama",
    },
]);
const golongan_darah = ref([
    {
        key: "A",
        value: "A",
    },
    {
        key: "B",
        value: "B",
    },
    {
        key: "AB",
        value: "AB",
    },
    {
        key: "O",
        value: "O",
    },
]);
const agama = ref([
    {
        key: "islam",
        value: "Islam",
    },
    {
        key: "katolik",
        value: "katolik",
    },
]);
const page = usePage();
const data = useForm({
    __method: "PUT",
    nisn: page.props.data.nisn,
    nik: page.props.data.nik,
    nama: page.props.data.nama,
    jenis_kelamin: page.props.data.jenis_kelamin,
    tempat_lahir: page.props.data.tempat_lahir,
    tanggal_lahir: page.props.data.tanggal_lahir,
    agama: page.props.data.agama,
    golongan_darah: page.props.data.golongan_darah,
    tempat_tinggal: page.props.data.tempat_tinggal,
    alat_transportasi: page.props.data.alat_transportasi,
    no_telp: page.props.data.no_telp,
    email: page.props.data.email,
    pas_foto: page.props.data.pas_foto ?? ref(null),
    no_kip: page.props.data.no_kip ?? "-",
    no_kis: page.props.data.no_kis ?? "-",
    no_kks: page.props.data.no_kks ?? "-",
    no_sktm: page.props.data.no_sktm ?? "-",
    hobi: page.props.data.hobi,
    cita_cita: page.props.data.cita_cita,
});
const loading = ref(false);
const simpan = computed(function () {
    data.post(route("form.biodata.save"), {
        preserveScroll: false,
        preserveState: true,
        onStart: () => {
            loading.value = true;
        },
        onFinish: () => {
            loading.value = false;
            if (usePage().props.errors.success) {
                toast.success(usePage().props.errors.success);
            } else {
                toast.error("Ada kesalahan saat menyimpan data");
            }
        },
    });
});
function uploaded(e) {
    const file = e.detail.allEntries[0];
    if (file.isSuccess) {
        data.pas_foto = file.cdnUrl;
    }
}
</script>
<template>
    <AuthenticatedLayout title="Isi Biodata">
        <template #header>ISI BIODATA</template>

        <div class="p-4 bg-white rounded shadow-lg sm:p-8">
            <form @submit.prevent="simpan" method="post" action="" class="space-y-4">
                <div class="flex flex-col items-center gap-3 sm:flex-row">
                    <div class="w-full">
                        <InputLabel>NISN</InputLabel>
                        <TextInput :error="$page.props.errors.nisn != null" v-model="data.nisn"
                            placeholder="Ketikan nisn (No induk siswa nasional)" type="number" />
                        <InputError :message="$page.props.errors.nisn" />
                    </div>
                    <div class="w-full">
                        <InputLabel>NIK</InputLabel>
                        <TextInput :error="$page.props.errors.nik != null" v-model="data.nik"
                            placeholder="Ketikan nik (No induk kependudukan)" type="number" />
                        <InputError :message="$page.props.errors.nik" />
                    </div>
                </div>
                <div class="w-full">
                    <InputLabel>Alat Transportasi Kesekolah</InputLabel>
                    <TextInput :error="$page.props.errors.alat_transportasi != null" v-model="data.alat_transportasi"
                        placeholder="Alat transportasi Contoh:Mobil" type="text" />
                    <InputError :message="$page.props.errors.alat_transportasi" />
                </div>
                <div class="">
                    <InputLabel>Nama</InputLabel>
                    <TextInput :error="$page.props.errors.nama != null" v-model="data.nama"
                        placeholder="Ketikan nama anda" :value="data.nama ?? $page.props.auth.user.name" />
                    <InputError :message="$page.props.errors.nama" />
                </div>
                <div class="">
                    <InputLabel>Tempat Tinggal</InputLabel>
                    <Select :error="$page.props.errors.tempat_tinggal != null" v-model="data.tempat_tinggal"
                        label="Tempat Tinggal" :items="tempat_tinggal" />
                    <InputError :message="$page.props.errors.tempat_tinggal" />
                </div>
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div class="">
                        <InputLabel>Jenis Kelamin</InputLabel>
                        <Select :error="$page.props.errors.jenis_kelamin != null" v-model="data.jenis_kelamin"
                            label="Jenis kelamin" :items="jenis_kelamin" />
                        <InputError :message="$page.props.errors.jenis_kelamin" />
                    </div>
                    <div class="">
                        <InputLabel>Agama</InputLabel>
                        <Select :error="$page.props.errors.agama != null" v-model="data.agama" label="agama"
                            :items="agama" />
                        <InputError :message="$page.props.errors.agama" />
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div class="">
                        <InputLabel>Tempat Lahir</InputLabel>
                        <TextInput :error="$page.props.errors.tempat_lahir != null" v-model="data.tempat_lahir"
                            placeholder="Tempat lahir" type="text" />
                        <InputError :message="$page.props.errors.tempat_lahir" />
                    </div>
                    <div class="">
                        <InputLabel>Tanggal Lahir</InputLabel>
                        <TextInput :error="$page.props.errors.tanggal_lahir != null" v-model="data.tanggal_lahir"
                            type="date" />
                        <InputError :message="$page.props.errors.tanggal_lahir" />
                    </div>
                </div>
                <div class="">
                    <InputLabel>Golongan Darah</InputLabel>
                    <Select :error="$page.props.errors.golongan_darah != null" v-model="data.golongan_darah"
                        :items="golongan_darah" />
                    <InputError :message="$page.props.errors.golongan_darah" />
                </div>
                <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
                    <div class="">
                        <InputLabel>No Telp</InputLabel>
                        <TextInput :error="$page.props.errors.no_telp != null" v-model="data.no_telp" type="tel" />
                        <InputError :message="$page.props.errors.no_telp" />
                    </div>
                    <div class="">
                        <InputLabel>Email</InputLabel>
                        <TextInput :error="$page.props.errors.email != null" v-model="data.email" type="email" />
                        <InputError :message="$page.props.errors.email" />
                    </div>
                </div>
                <div class="">
                    <InputLabel>Hobi</InputLabel>
                    <TextInput type="text" v-model="data.hobi" />
                </div>
                <div class="">
                    <InputLabel>Cita Cita</InputLabel>
                    <TextInput v-model="data.cita_cita" type="tel" />
                </div>
                <div class="grid grid-cols-1 gap-3 sm:grid-cols-3">
                    <div class="">
                        <InputLabel>No KIP</InputLabel>
                        <TextInput v-model="data.no_kip" type="text" />
                        <span class="text-xs italic text-orange-500">(-) Strip jika tidak memiliki kip</span>
                    </div>
                    <div class="">
                        <InputLabel>No KIS</InputLabel>
                        <TextInput v-model="data.no_kis" type="text" />
                        <span class="text-xs italic text-orange-500">(-) Strip jika tidak memiliki KIS</span>
                    </div>
                    <div class="">
                        <InputLabel>No KKS</InputLabel>
                        <TextInput v-model="data.no_kks" type="text" />
                        <span class="text-xs italic text-orange-500">(-) Strip jika tidak memiliki KKS</span>
                    </div>
                </div>
                <div class="">
                    <InputLabel>No SKTM</InputLabel>
                    <TextInput v-model="data.no_sktm" type="text" />
                    <span class="text-xs italic text-orange-500">(-) Strip jika tidak memiliki SKTM</span>
                </div>
                <div class="">
                    <InputLabel>Pas Foto</InputLabel>
                    <UploadCare @change="uploaded" />
                    <img class="max-w-[114px] aspect-square object-cover mt-4 border rounded-lg shadow"
                        v-if="data.pas_foto" :src="data.pas_foto" />
                </div>
                <PrimaryButton>SIMPAN</PrimaryButton>
            </form>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>
.lr-copyright .credits {
    display: none !important;
}
</style>
