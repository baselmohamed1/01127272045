<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';

import { Head, Link, useForm } from '@inertiajs/vue3';
import Checkbox from '@/Components/CustomVodex/Checkbox.vue';
import InputError from '@/Components/CustomVodex/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/CustomVodex/TextInput.vue';

defineProps({
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.transform(data => ({
        ...data,
        remember: form.remember ? 'on' : '',
    })).post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};

const togglePassword = () => {
    let passwordInput = document.getElementById('password')

    const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
    passwordInput.setAttribute("type", type);

    $('#togglePasswordIcon').toggleClass('ti-eye-off ti-eye');

}

</script>

<template>
    <GuestLayout title="Sign in">
        <template #content>

            <div class="authentication-inner row">

                <div class="d-none d-lg-flex col-lg-7 p-0">

                    <div class="auth-cover-bg auth-cover-bg-color d-flex justify-content-center align-items-center" 
                    style="background-color: #f5f2f9;">
                        <img src="/assets/img/illustrations/auth-login-illustration-light.png"
                            alt="auth-login-cover" class="img-fluid my-5 auth-illustration"
                            data-app-light-img="illustrations/auth-login-illustration-light.png"
                            data-app-dark-img="illustrations/auth-login-illustration-dark.png"/>

                        <img src="/assets/img/illustrations/bg-shape-image-light.png"
                            alt="auth-login-cover" class="platform-bg"
                            data-app-light-img="illustrations/bg-shape-image-light.png"
                            data-app-dark-img="illustrations/bg-shape-image-dark.png"/>
                    </div>


                </div>

                <div class="d-flex col-12 col-lg-5 align-items-center p-sm-5 p-4">
                    <div class="w-px-400 mx-auto">

                        <div class="app-brand mb-4">
                            <Link :href="route('login')" class="app-brand-link gap-2">
                            <span class="app-brand-logo demo">
                                <svg width="32" height="22" viewBox="0 0 32 22" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
                                        fill="#7367F0" />
                                    <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                                        d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z"
                                        fill="#161616" />
                                    <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                                        d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z"
                                        fill="#161616" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
                                        fill="#7367F0" />
                                </svg>
                            </span>
                            </Link>

                        </div>

                        <h3 class="mb-1 fw-bold">Vodex</h3>
                        <!-- <p class="mb-4">Please sign-in to your account and start the adventure</p> -->

                        <div v-if="status" class="text-success">
                            {{ status }}
                        </div>

                        <form  @submit.prevent="submit"
                            class="mb-3 fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
                            <div class="mb-3 fv-plugins-icon-container">
                                <!-- <InputLabel for="email" class="form-label" value="Email" /> -->
                                <label for="email" class="form-label">Email</label>
                                <TextInput placeholder="Enter your email " id="email" v-model="form.email" type="email"
                                    required autofocus name="email-username" />
                                <InputError class="mt-2" :message="form.errors.email" />
                            </div>
                             <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password">Password</label>
                                    <Link :href="route('password.request')">
                                    <small>Forgot Password?</small>

                                    </Link>

                                </div>
                                 <div class="input-group input-group-merge has-validation shadow-none">

                                    <TextInput id="password" v-model="form.password" type="password" required
                                        autocomplete="current-password" name="password" placeholder="Enter your password" />
                                    <span @click="togglePassword" class="input-group-text cursor-pointer">
                                        <i id="togglePasswordIcon" class="ti ti-eye-off"></i>
                                    </span>

                                    <InputError class="mt-2" :message="form.errors.password" />

                                </div>

                            </div>

                            <div class="mb-3">
                                <div class="form-check">
                                    <Checkbox v-model:checked="form.remember" name="remember" id="remember-me" />

                                    <label class="form-check-label" for="remember-me"> Remember me
                                    </label>

                                </div>
                            </div>
                            <PrimaryButton class="btn btn-primary d-grid w-100"
                                :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                Sign in
                            </PrimaryButton>
                        </form>

                        <p class="text-center">
                            <span>New on our platform?</span>&nbsp;
                            <Link :href="route('register')">
                            <span>Create an account</span>

                            </Link>
                        </p>
                    </div>
                </div>
                <!-- /Login -->
            </div>

        </template>
    </GuestLayout>
</template>
