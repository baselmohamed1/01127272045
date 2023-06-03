<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { ref, onMounted } from "vue";
import { useForm, router } from "@inertiajs/vue3";

const form = ref({
    csrf: "",
    server_name: props.server.server_name,
    ssh_user_name: props.server.ssh_user_name,
    ssh_host_name: props.server.ssh_host_name,
    ssh_password: props.server.ssh_password,
});

const props = defineProps({
    server: Object,
});

onMounted(() => {
    form.value.csrf = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");
});


</script>
<template>
    <AppLayout title="Edit Server">
        <template #header>
            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- server edit -->
                <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="pb-sm-5 pb-2 rounded-top">
                        <div class="container py-5">
                            <h2 class="text-center mb-2 mt-0 mt-md-4">Edit Server</h2>
                            <div class="max-w-7xl mx-auto container-xxl py-3 mb-4 sm:px-6 lg:px-8">

                                <div class="row justify-content-center mt-4" id="#app">
                                    <div class="col-lg-6 align-item-center">
                                        <div class="card p-4 h-100 rounded">
                                            <div class="mb-3 fv-plugins-icon-container">
                                                <form :action="route('servers.update', props.server.id)" method="POST">
                                            <input type="hidden" name="_token" :value="form.csrf" />

                                            <div class="mb-3">
                                                <label class="form-label" for="basic-icon-default-fullname">Server
                                                    name</label>
                                                <div class="input-group input-group-merge">
                                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                            class="ti ti-server"></i></span>
                                                    <input type="text" name="server_name" class="form-control"
                                                        id="basic-icon-default-fullname" placeholder="server name"
                                                        aria-label="server_name" v-model="form.server_name"
                                                        aria-describedby="basic-icon-default-fullname2" required=""  />
                                                </div>

                                                <label class="form-label" for="basic-icon-default-fullname">SSH Host
                                                    name</label>
                                                <div class="input-group input-group-merge">
                                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                            class="ti ti-world"></i></span>
                                                    <input type="text" name="ssh_host_name" class="form-control"
                                                        id="basic-icon-default-fullname" placeholder="ssh host name"
                                                        aria-label="ssh_user_name" v-model="form.ssh_host_name"
                                                        aria-describedby="basic-icon-default-fullname2" required=""  />
                                                </div>

                                                <label class="form-label" for="basic-icon-default-fullname">SSH User
                                                    name</label>
                                                <div class="input-group input-group-merge">
                                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                            class="ti ti-stack"></i></span>
                                                    <input type="text" name="ssh_user_name" class="form-control"
                                                        id="basic-icon-default-fullname" placeholder="ssh user name"
                                                        aria-label="ssh_user_name" v-model="form.ssh_user_name" 
                                                        aria-describedby="basic-icon-default-fullname2" required="" />
                                                </div>

                                                <label class="form-label" for="basic-icon-default-fullname">SSH
                                                    Password</label>
                                                <div class="input-group input-group-merge">
                                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                            class="ti ti-key"></i></span>
                                                    <input type="text" name="ssh_password" id="multicol-password"
                                                        class="form-control" placeholder="Enter password" v-model="form.ssh_password"
                                                        aria-describedby="multicol-password2" required=""  />
                                                </div>
                                            </div>

                                            <div class="row d-flex">
                                                <div class="col gap-5">
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                       Update
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- / server edit -->
            </div>
            <!-- Content wrapper -->
        </template>
    </AppLayout>
</template>