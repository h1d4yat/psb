<script setup>
import { ref } from 'vue';

import * as LR from '@uploadcare/blocks';

const emit = defineEmits(["change"]);

LR.registerBlocks(LR);
const uplaod = ref();

const simpan = function (e) {
    emit("change", e);
};
</script>
<template>
    <lr-config
        style="display: none"
        ctx-name="pas_foto"
        pubkey="c64ee16641f33a7af900"
        :maxLocalFileSizeBytes="10000000"
        :multiple="false"
        :imgOnly="true"
        sourceList="local, url, camera, dropbox, facebook, gdrive, gphotos, instagram"
    ></lr-config>

    <lr-file-uploader-regular
        css-src="https://cdn.jsdelivr.net/npm/@uploadcare/blocks@0.35.2/web/lr-file-uploader-regular.min.css"
        ctx-name="pas_foto"
        class="my-config"
    >
    </lr-file-uploader-regular>
    <lr-upload-ctx-provider
        @change="simpan"
        ref="uplaod"
        ctx-name="pas_foto"
    ></lr-upload-ctx-provider>
</template>
<style scoped>
.my-config {
    --darkmode: 0;
    --h-accent: 210;
    --s-accent: 25%;
    --l-accent: 20%;
}
</style>
