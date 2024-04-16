<script setup>
defineProps({
    message: {
        type: String,
    },
});
</script>

<template>
    <Transition
        enter-active-class="duration-300 ease-out"
        enter-from-class="opacity-0"
        enter-to-class="opacity-100"
        leave-active-class="duration-200 ease-in"
        leave-from-class="opacity-100"
        leave-to-class="opacity-0"
    >
        <div v-show="message" class="mt-1">
            <p class="flex items-center justify-start gap-1 text-sm text-red-600 animate-pulse">
                <i class="pi animate-spin pi-times-circle"></i>
                {{ message }}
            </p>
        </div>
    </Transition>
</template>
