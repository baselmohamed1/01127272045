<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';

import { ref, onMounted } from 'vue'

import { Head, Link, useForm } from '@inertiajs/vue3';
import Checkbox from '@/Components/CustomVodex/Checkbox.vue';
import InputError from '@/Components/CustomVodex/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/CustomVodex/TextInput.vue';

const form = useForm({
  name: '',
  email: '',
  password: '',
  password_confirmation: '',
  terms: false,

});

const submit = () => {
  form.post(route('register'), {

    onFinish: () => form.reset('password', 'password_confirmation'),

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



  <GuestLayout title="Register">
    <template #content>

      <!-- <h4 class="fw-bold py-3 mb-4">
                    <span class="text-muted fs-1-5 fw-light">Register!</span>
                </h4> -->


      <div class="authentication-wrapper authentication-cover authentication-bg">
        <div class="authentication-inner row">
          <!-- /Left Text -->
          <div class="d-none d-lg-flex col-lg-7 p-0">
            <div class="auth-cover-bg auth-cover-bg-color d-flex justify-content-center align-items-center "
            style="background-color: #f5f2f9;">
              <img src="/assets/img/illustrations/auth-register-illustration-light.png"
                alt="auth-register-cover" class="img-fluid my-5 auth-illustration"
                data-app-light-img="illustrations/auth-register-illustration-light.png"
                data-app-dark-img="illustrations/auth-register-illustration-dark.png" />

              <img src="/assets/img/illustrations/bg-shape-image-light.png" alt="auth-register-cover"
                class="platform-bg" data-app-light-img="illustrations/bg-shape-image-light.png"
                data-app-dark-img="illustrations/bg-shape-image-dark.png" />
            </div>
          </div>
          <!-- /Left Text -->

          <!-- Register -->
          <div class="d-flex col-12 col-lg-5 align-items-center p-sm-5 p-4">
            <div class="w-px-400 mx-auto">
              <!-- Logo -->
              <div class="app-brand mb-4">
                <a href="index.html" class="app-brand-link gap-2">
                  <span class="app-brand-logo demo">
                    <svg width="32" height="22" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
                        fill="#7367F0" />
                      <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                        d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z" fill="#161616" />
                      <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
                        d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z" fill="#161616" />
                      <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
                        fill="#7367F0" />
                    </svg>
                  </span>
                </a>
              </div>
              <!-- /Logo -->
              <h3 class="mb-1 fw-bold">Vodex</h3>
              <!-- <p class="mb-4">ChatGPT-Style AI Trained With Your Content</p> -->

              <form @submit.prevent="submit"
                class="mb-3 fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
                <div class="mb-3">
                  <label for="name" class="form-label">Name</label>

                  <TextInput class="form-control" placeholder="Enter your name " id="name" v-model="form.name"
                    type="text" name="name" />
                  <InputError class="mt-2" :message="form.errors.name" />
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <TextInput class="form-control" placeholder="Enter your email " id="email" v-model="form.email"
                    type="email"  name="email" />
                  <InputError class="mt-2" :message="form.errors.email" />
                </div>
                <div class="mb-3 form-password-toggle">
                  <label class="form-label" for="password">Password</label>
                  <div class="input-group input-group-merge has-validation shadow-none">

                    <TextInput class="form-control"
                      placeholder="**********"
                      id="password" v-model="form.password" type="password"  name="password" aria-describedby="password"/>

                    <span @click="togglePassword" class="input-group-text cursor-pointer">
                      <i id="togglePasswordIcon" class="ti ti-eye-off"></i>
                    </span>
                    <InputError class="mt-2" :message="form.errors.password" />
                  </div>
                </div>


                <!--confirm password-->
                <div class="mt-4 mb-4">
                  <InputLabel for="password_confirmation" value="Confirm Password" />
                  <TextInput placeholder="********" id="password_confirmation" v-model="form.password_confirmation" type="password"
                    class="form-control" required autocomplete="new-password" />
                  <InputError class="mt-2" :message="form.errors.password_confirmation" />
                </div>
                <!--confirm password-->

                <button class="btn btn-primary d-grid w-100">Sign up</button>
              </form>

              <p class="text-center">
                <span>Already have an account?</span>&nbsp;
                <Link :href="route('login')">
                            <span>Sign in</span>

                            </Link>
              </p>
            </div>
          </div>
          <!-- /Register -->
        </div>
      </div>


      <!-- / Content -->

      <!-- / Verify email -->



    </template>
  </GuestLayout>
</template>
