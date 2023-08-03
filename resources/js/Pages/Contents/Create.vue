<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { ref, onMounted } from "vue";
import { useForm } from '@inertiajs/vue3';


const form = useForm({
  csrf: "",
});

defineProps({
  platforms: Object,
  contents: Object,
  servers: Object,
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
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
          <div class="pb-sm-5 pb-2 rounded-top">
            <div class="container py-5">
              <h2 class="text-center mb-2 mt-0 mt-md-4">Create Content</h2>
              <!-- create contents -->
              <div class="container mt-5 d-flex justify-content-center">
                <div class="col-md-8">
                  <div class="card mb-4">
                    <div class="card-body">
                      <form method="POST" action="/contents">
                        <input type="hidden" name="_token" :value="form.csrf" />

                        <label class="form-label" for="basic-icon-default-fullname">Content name</label>
                        <div class="input-group input-group-merge">
                          <span id="basic-icon-default-fullname2 " class="input-group-text rounded-0"><i
                              class="ti ti-clipboard"></i></span>
                          <input type="text" name="content_name" class="form-control" id="basic-icon-default-fullname"
                            placeholder="content name" aria-label="content_name"
                            aria-describedby="basic-icon-default-fullname2" required="">
                        </div>

                        <label class="form-label" for="basic-icon-default-fullname">Platform & Url</label>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend d-flex ">
                            <span id="basic-icon-default-fullname2 " class="input-group-text rounded-0"><i
                                class="ti ti-user"></i></span>
                            <select class="form-select rounded-0" required="" placeholder="Choose which Platform"
                              name="platform_id">
                              <option value="" disabled selected hidden>Please Choose...</option>
                              <option v-for="platform in platforms" :value="platform.id">{{ platform.domain }}</option>
                            </select>
                          </div>
                          <input type="text" name="url" class="form-control" id="basic-icon-default-fullname"
                            placeholder="url" aria-label="url" aria-describedby="basic-icon-default-fullname2"
                            required="">
                        </div>

                        <label class="form-label" for="basic-icon-default-fullname">Servers & folderpath</label>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend d-flex ">
                            <span id="basic-icon-default-fullname2 " class="input-group-text rounded-0"><i
                                class="ti ti-folder"></i></span>
                            <select class="form-select rounded-0" required="" placeholder="Choose which server"
                              name="server_id">
                              <option value="" disabled selected hidden>Please Choose...</option>
                              <option v-for="server in servers" :value="server.id">{{ server.server_name }}</option>
                            </select>
                          </div>

                          <input type="text" name="folder_path" class="form-control" id="basic-icon-default-fullname"
                            placeholder="folder_path" aria-label="folderpath"
                            aria-describedby="basic-icon-default-fullname2" required="">
                        </div>

                        <div class="mb-3">
                          <label class="form-label" name="media_type" for="basic-default-media_type">Media Type</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-company2" class="input-group-text"><i
                                class="ti ti-unlink"></i></span>
                            <select class="form-select" name="media_type" aria-label="Default select example"
                              placeholder="Choose which media type" required="">
                              <option>Choose which Media type </option>
                              <option>Movie</option>
                              <option>Series</option>
                            </select>
                          </div>
                        </div>

                      <div class="mb-3">
                          <label class="form-label" name="download_type">Select  Download Type</label>
                          <div class="d-flex">
                              <div class="d-flex items-center me-4">
                                  <input id="inline-checkbox" type="radio" name="download_type" value="latest" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                  <label for="inline-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Latest</label>
                              </div>
                              <div class="d-flex items-center me-4">
                                  <input id="inline-2-checkbox" type="radio" name="download_type" value="all" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                  <label for="inline-2-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">All Files</label>
                              </div>

                          </div>

                      </div>

                        <button type="submit" class="btn btn-primary waves-effect waves-light">Create</button> &nbsp;

                        <button type="reset" class="btn btn-label-secondary waves-effect" data-bs-dismiss="modal"
                          aria-label="Close"> Cancel </button>

                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!-- create contents -->
            </div>
          </div>
        </div>
      </div>
      <!-- Content wrapper -->
    </template>

  </AppLayout>
</template>

