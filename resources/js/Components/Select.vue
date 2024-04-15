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
    }
});

defineExpose({ focus: () => input.value.focus() })
</script>
<template>
    <select ref="input" v-model="model"
        class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        <option v-for="item of items" :selected="item.selected" :value="item.key">{{ item.value }}</option>
    </select>
</template>