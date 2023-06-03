<script setup>
import { Head, Link, router } from '@inertiajs/vue3';

defineProps({
    title: String,
});

</script>

<template>
    
    <Head :title="title" />

    <!-- Layout wrapper -->
    <div class="authentication-wrapper authentication-cover authentication-bg">
        <slot name="content"/>
    </div>
    <!-- / Layout wrapper -->
</template>
