<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { onMounted } from "vue";
import { useForm } from "@inertiajs/vue3";

const form = useForm({
    csrf: "",
});

defineProps({
    platform: Object,
    server: Object,
    content: Object,
    user: Object,
});
onMounted(() => {
    form.csrf = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");
});
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- server create -->
                <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="pb-sm-5 pb-2 rounded-top">
                        <div class="container py-5">
                            <h2 class="text-center mb-2 mt-0 mt-md-4">Create Server</h2>
                            <div class="container mt-5 d-flex justify-content-center">
                                <div class="col-md-6 card mb-4">
                                    <div class="card-body">
                                        <form method="POST" action="/servers">
                                            <input type="hidden" name="_token" :value="form.csrf" />

                                            <div class="mb-3">
                                                <label class="form-label" for="basic-icon-default-fullname">Server
                                                    name</label>
                                                <div class="input-group input-group-merge">
                                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                            class="ti ti-server"></i></span>
                                                    <input type="text" name="server_name" class="form-control"
                                                        id="basic-icon-default-fullname" placeholder="server name"
                                                        aria-label="server_name"
                                                        aria-describedby="basic-icon-default-fullname2" required="" />
                                                </div>

                                                <label class="form-label" for="basic-icon-default-fullname">SSH Host
                                                    name</label>
                                                <div class="input-group input-group-merge">
                                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                            class="ti ti-world"></i></span>
                                                    <input type="text" name="ssh_host_name" class="form-control"
                                                        id="basic-icon-default-fullname" placeholder="ssh host name"
                                                        aria-label="ssh_user_name"
                                                        aria-describedby="basic-icon-default-fullname2" required="" />
                                                </div>

                                                <label class="form-label" for="basic-icon-default-fullname">SSH User
                                                    name</label>
                                                <div class="input-group input-group-merge">
                                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                            class="ti ti-stack"></i></span>
                                                    <input type="text" name="ssh_user_name" class="form-control"
                                                        id="basic-icon-default-fullname" placeholder="ssh user name"
                                                        aria-label="ssh_user_name"
                                                        aria-describedby="basic-icon-default-fullname2" required="" />
                                                </div>

                                                <label class="form-label" for="basic-icon-default-fullname">SSH
                                                    Password</label>
                                                <div class="input-group input-group-merge">
                                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                            class="ti ti-key"></i></span>
                                                    <input type="password" name="ssh_password" id="multicol-password"
                                                        class="form-control" placeholder="Enter password"
                                                        aria-describedby="multicol-password2" required="" />
                                                </div>
                                            </div>

                                            <div class="row d-flex">
                                                <div class="col gap-5">
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                        Create
                                                    </button>
                                                    &nbsp;
                                                    <button type="reset" class="btn btn-label-secondary waves-effect"
                                                        data-bs-dismiss="modal" aria-label="Close">
                                                        Cancel
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
                <!-- / server create -->
            </div>
            <!-- Content wrapper -->
        </template>
    </AppLayout>
</template>
