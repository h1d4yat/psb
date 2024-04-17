<script setup>
import {
  onMounted,
  ref,
} from 'vue';

const model = defineModel({
    type: String,
    required: true,
});
const props = defineProps({
    error:{
        type:Boolean,
        required:false,
    }
})
const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
    <input
    :class="props.error ? 'bg-red-50 w-full border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500' : 'border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 w-full'"
        v-model="model"
        ref="input"
    />
</template>
