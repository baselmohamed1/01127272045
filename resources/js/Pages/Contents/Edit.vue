<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { ref, onMounted } from "vue";
import { useForm, router } from "@inertiajs/vue3";
import axios from "axios";

const form = ref({
    csrf: "",
    platform: props.content.platform.domain,
    server: props.content.server.server_name,
    content_name: props.content.content_name,
    url: props.content.url,
    folder_path: props.content.folder_path,
    media_type: props.content.media_type,
});

const props = defineProps({
    content: Object,
    platforms: Object,
    servers: Object,
});

onMounted(() => {
    form.value.csrf = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");

});
</script>
<template>
    <AppLayout title="Edit Content">
        <template #header>
            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->
                <div class="container-xxl flex-grow-1 container-p-y">
                    <!--Edit Content -->
                    <div class="pb-sm-5 pb-2 rounded-top">
                        <div class="container py-5">
                            <h2 class="text-center mb-2 mt-0 mt-md-4">Edit Content</h2>
                            <div class="max-w-7xl mx-auto container-xxl py-3 mb-4 sm:px-6 lg:px-8">
                                <div class="form-group platform_id">
                                    <div class="container mt-5 d-flex justify-content-center">
                                        <div class="col-md-8">
                                            <div class="card mb-4">
                                                <div class="card-body">
                                                    <form method="POST" :action="route('contents.update', props.content.id)">
                                                        <input type="hidden" name="_token" :value="form.csrf" />

                                                        <label class="form-label" for="basic-icon-default-fullname">Content
                                                            name</label>
                                                        <div class="input-group input-group-merge">
                                                            <span id="basic-icon-default-fullname2 "
                                                                class="input-group-text rounded-0"><i
                                                                    class="ti ti-clipboard"></i></span>
                                                            <input type="text" name="content_name" class="form-control"
                                                                id="basic-icon-default-fullname" placeholder="content name"
                                                                aria-label="content_name"
                                                                aria-describedby="basic-icon-default-fullname2" required=""
                                                                v-model="form.content_name">
                                                        </div>

                                                        <label class="form-label" for="basic-icon-default-fullname">Platform
                                                            & Url</label>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend d-flex ">
                                                                <span id="basic-icon-default-fullname2 "
                                                                    class="input-group-text rounded-0"><i
                                                                        class="ti ti-user"></i></span>
                                                                <select class="form-select rounded-0" name="platform_id"
                                                                    required="" placeholder="Choose which Platform">
                                                                    <option v-if="platforms.length > 0"
                                                                        v-for="platform in platforms"
                                                                        :platform.id="platform" v-bind:value="platform.id">
                                                                        {{ platform.domain }}
                                                                    </option>
                                                                </select>
                                                            </div>
                                                            <input type="text" v-model="form.url" name="url"
                                                                class="form-control" id="basic-icon-default-fullname"
                                                                placeholder="url" aria-label="url"
                                                                aria-describedby="basic-icon-default-fullname2" required="">
                                                        </div>

                                                        <label class="form-label" for="basic-icon-default-fullname">Servers
                                                            & folderpath</label>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend d-flex ">
                                                                <span id="basic-icon-default-fullname2 "
                                                                    class="input-group-text rounded-0"><i
                                                                        class="ti ti-folder"></i></span>
                                                                <select class="form-select rounded-0" required=""
                                                                    placeholder="Choose which server" name="server_id">
                                                                    <option v-for="server in servers" :value="server.id">{{
                                                                        server.server_name }}</option>
                                                                </select>
                                                            </div>

                                                            <input type="text" name="folder_path" class="form-control"
                                                                id="basic-icon-default-fullname" placeholder="folder_path"
                                                                aria-label="folderpath"
                                                                aria-describedby="basic-icon-default-fullname2"
                                                                v-model="form.folder_path" required="">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label class="form-label" name="media_type"
                                                                for="media_type">Media Type</label>
                                                            <div class="input-group input-group-merge">
                                                                <span id="basic-icon-default-company2"
                                                                    class="input-group-text"><i
                                                                        class="ti ti-unlink"></i></span>
                                                                <select class="form-select" name="media_type"
                                                                    placeholder=""
                                                                    required="" 
                                                                     v-model="form.media_type">
                                                                    <option :value="content.media_type">
                                                                    {{ content.media_type }}</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <button type="submit"
                                                            class="btn btn-primary waves-effect waves-light">Update</button>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ coontent edit -->
                    </div>
                </div>
            </div>
            <!-- Content wrapper -->
        </template>
    </AppLayout>
</template>
