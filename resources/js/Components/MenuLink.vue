<script setup>
import {
  computed,
  onMounted,
} from 'vue';

import { Link } from '@inertiajs/vue3';

const props = defineProps({
    href: {
        type: String,
        required: true,
    },
    active: {
        type: Boolean
    },
    badge :{
        type:String,
        required:false,
    }
});

const classes = computed(function () {
    return props.active ? 'flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 bg-gray-100 dark:bg-gray-700 group' : 'flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group'
})

</script>
<template>
    <li>
        <Link :href="href" :class="classes">
        <slot
            class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
            name="icon" />
           <span class="flex justify-between w-full ms-3">
            <slot />
            <span v-show="badge != null" class="flex items-center justify-center h-6 text-xs text-white text-gray-900 bg-red-500 rounded-full aspect-square">
                {{ badge }}
            </span>
        </span>
        </Link>
    </li>
</template>