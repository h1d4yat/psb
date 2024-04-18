<script setup>
import PrimaryButton from '@/Components/PrimaryButton.vue';
</script>
<template>
    <h1 class="mb-4 text-lg font-bold">Status Form</h1>
    <div class="space-y-3">
        <div v-for="i, val in $page.props.progress">

            <div class="flex justify-between mb-1">
                <span class="text-base font-medium text-gray-700 capitalize dark:text-white">{{ val }}</span>
                <span class="text-sm font-medium text-gray-700 dark:text-white"> {{ i }} %</span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                <div class="bg-gray-600 h-2.5 rounded-full" :style="{ width: i + '%' }"></div>
            </div>

        </div>
    </div>
    <PrimaryButton class="mt-5">Finalisasi</PrimaryButton>
</template>
