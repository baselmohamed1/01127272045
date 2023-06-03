<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
    <button :type="type" class="ms-auto btn btn-primary">
        <slot />
    </button>
</template>
