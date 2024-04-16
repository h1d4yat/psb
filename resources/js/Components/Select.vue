<script setup>
import {
  defineProps,
  ref,
} from 'vue';

const model = defineModel({
    type: String,
    required: true,
});
const input = ref(null);
const props = defineProps({
    items: {
        type: Object,
        required: true,
    },
    label : {
        type : String,
        required:false,
    },
    error:{
        type:Boolean,
        required:false,
    }
});

defineExpose({ focus: () => input.value.focus() })
</script>
<template>
    <select ref="input" v-model="model"
    :class="props.error ? 'bg-red-50 w-full border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500' : 'border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 w-full'"
    >
        <option value="" v-if="props.label" selected readonly disabled>--{{ props.label }}--</option>
        <option v-for="item of items" :selected="item.selected" :value="item.key">{{ item.value }}</option>
    </select>
</template>