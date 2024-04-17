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
    tempat_tinggal: page.props.tempat_tinggal,
    alat_transportasi: page.props.alat_transportasi,
    no_telp: page.props.data.no_telp,
    email: page.props.data.email,
    pas_foto: page.props.data.pas_foto,
    no_kip: page.props.data.no_kip,
    no_kis: page.props.data.no_kis,
    no_kks: page.props.data.no_kks,
    no_sktm: page.props.data.no_sktm,
    hobi: page.props.data.hobi,
    cita_cita: page.props.data.cita_cita,
});
const loading = ref(false);
const simpan = computed(function () {
    data.post(route("form.biodata.save"), {
        preserveScroll: false,
        preserveState: false,
        onStart: () => {
            loading.value = true;
        },
        onFinish: () => {
            loading.value = false;
            toast.success("Biodata sudah di simpan");
        },
        onError: (e) => {
            toast.error(e);
        },
    });
});
</script>
<template>
    <AuthenticatedLayout title="Isi Biodata">
        <template #header>ISI BIODATA</template>
        <div class="bg-white p-8 rounded shadow-lg">
            <form
                @submit.prevent="simpan"
                method="post"
                action=""
                class="space-y-4"
            >
                <div class="flex items-center gap-3">
                    <div class="w-full">
                        <InputLabel>NISN</InputLabel>
                        <TextInput
                            :error="$page.props.errors.nisn != null"
                            v-model="data.nisn"
                            placeholder="Ketikan nisn (No induk siswa nasional)"
                            type="number"
                        />
                        <InputError :message="$page.props.errors.nisn" />
                    </div>
                    <div class="w-full">
                        <InputLabel>NIK</InputLabel>
                        <TextInput
                            :error="$page.props.errors.nik != null"
                            v-model="data.nik"
                            placeholder="Ketikan nik (No induk kependudukan)"
                            type="number"
                        />
                        <InputError :message="$page.props.errors.nik" />
                    </div>
                </div>
                <div class="">
                    <InputLabel>Nama</InputLabel>
                    <TextInput
                        :error="$page.props.errors.nama !=null"
                        v-model="data.nama"
                        placeholder="Ketikan nama anda"
                        :value="$page.props.auth.user.name"
                    />
                    <InputError :message="$page.props.errors.nama" />
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="">
                        <InputLabel>Jenis Kelamin</InputLabel>
                        <Select
                            v-model="data.jenis_kelamin"
                            label="Jenis kelamin"
                            :items="jenis_kelamin"
                        />
                    </div>
                    <div class="">
                        <InputLabel>Agama</InputLabel>
                        <Select
                            v-model="data.agama"
                            label="agama"
                            :items="agama"
                        />
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="">
                        <InputLabel>Tempat Lahir</InputLabel>
                        <TextInput
                            v-model="data.tempat_lahir"
                            placeholder="Tempat lahir"
                            type="text"
                        />
                    </div>
                    <div class="">
                        <InputLabel>Tanggal Lahir</InputLabel>
                        <TextInput v-model="data.tanggal_lahir" type="date" />
                    </div>
                </div>
                <div class="">
                    <InputLabel>Golongan Darah</InputLabel>
                    <Select
                        v-model="data.golongan_darah"
                        :items="golongan_darah"
                    />
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <div class="">
                        <InputLabel>No Telp</InputLabel>
                        <TextInput v-model="data.no_telp" type="tel" />
                    </div>
                    <div class="">
                        <InputLabel>Email</InputLabel>
                        <TextInput v-model="data.email" type="email" />
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
                <div class="grid grid-cols-3 gap-3">
                    <div class="">
                        <InputLabel>No KIP</InputLabel>
                        <TextInput v-model="data.no_kip" type="text" />
                    </div>
                    <div class="">
                        <InputLabel>No KIS</InputLabel>
                        <TextInput v-model="data.no_kis" type="text" />
                    </div>
                    <div class="">
                        <InputLabel>No KKS</InputLabel>
                        <TextInput v-model="data.no_kks" type="text" />
                    </div>
                </div>
                <div class="">
                    <InputLabel>No SKTM</InputLabel>
                    <TextInput v-model="data.no_sktm" type="text" />
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
