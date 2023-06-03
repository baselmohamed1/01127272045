<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <Head title="Welcome" />

    <div class="d-flex justify-content-center min-vh-100 align-items-center text-center bg-light ">
        <div v-if="canLogin" class=" d-lg-block position-fixed top-0 end-0 px-4 py-4 d-block">
            <Link v-if="$page.props.user" :href="route('projects.show')" class="text-decoration-underline">My Projects</Link>

            <template v-else>
                <Link :href="route('login')" class="px-2 text-decoration-underline">Log in</Link>

                <Link v-if="canRegister" :href="route('register')" class="ml-4 px-2 text-decoration-underline">Register</Link>
            </template>
        </div>

        <div class="">


            <div class="fs-4">
                Welcome to Vodex...!
            </div>


        </div>
    </div>
</template>
