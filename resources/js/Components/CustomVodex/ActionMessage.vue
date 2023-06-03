<script setup>
defineProps({
    on: Boolean,
});
</script>

<template>
    <div>
        <transition >
            <div v-show="on" class="">
                <slot />
            </div>
        </transition>
    </div>
</template>
