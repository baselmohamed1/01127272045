<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head, Link, router, useForm } from '@inertiajs/vue3';
import { onMounted } from "vue";

defineProps({
  platforms: Object,
  contents: Object,
  user: Object,
  servers: Object,
})

const form = useForm({
  csrf: "",
});

const submit = (content_id) => {
  form.delete(route('contents.delete', content_id), {
  });
};

onMounted(() => {
  setTimeout(appendBootstrapDataTablesJS, 200);
  setTimeout(appendDataTablesJS, 500);

  function appendBootstrapDataTablesJS() {
    let bootstrapDataTablesJS = document.getElementById('bootstrapDataTables-js')
    if (bootstrapDataTablesJS != null) {
      bootstrapDataTablesJS.remove()
    }

    let bootstrapDataTablesScript = document.createElement('script')
    bootstrapDataTablesScript.setAttribute('src', '/assets/js/bootstrap-datatables.js')
    bootstrapDataTablesScript.setAttribute('id', 'bootstrapDataTables-js')
    document.body.appendChild(bootstrapDataTablesScript)
  }

  function appendDataTablesJS() {
    let dataTablesJS = document.getElementById('dataTables-js')
    if (dataTablesJS != null) {
      dataTablesJS.remove()
    }

    let dataTablesScript = document.createElement('script')
    dataTablesScript.setAttribute('src', '/assets/js/data-tables.js')
    dataTablesScript.setAttribute('id', 'dataTables-js')
    document.body.appendChild(dataTablesScript)
  }
});

</script>

<template>
  <AppLayout title="Dashboard">
    <template #header>
      <!-- content list -->
      <div class="container mt-5">
        <div class="card">
          <div class="d-flex justify-content-between align-items-center card-header border-bottom">
            <h5 class="card-title mb-0">Content List</h5>
            <Link :href="route('contents.create')">
            <button class="btn btn-secondary add-new btn-primary " tabindex="0" aria-controls="DataTables_Table_0"
              type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser"><span>
                <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i><span class="d-none d-sm-inline-block">
                  Add Content</span>
              </span>
            </button>
            </Link>
          </div>
          <div class="m-3  card-datatable table-responsive">
            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
              <table class="table border-top dataTable" id="DataTables_Table_0">
                <thead>
                  <tr class="text-center">

                    <th>Platform/URL</th>
                    <th>Content name</th>
                    <th>Server</th>
                    <th>Folder Path</th>
                    <th>Media Type</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="odd" v-for="content in contents">

                    <td style="overflow-wrap: anywhere;">{{ content.platform.domain + content.url }}</td>

                    <td>{{ content.content_name }}</td>

                    <td>{{ content.server.server_name }}</td>

                    <td>{{ content.folder_path }}</td>

                    <td>{{ content.media_type }}</td>

                    <td>
                      <div class="d-flex">
                        <Link :href="'/contents/' + content.id + '/edit'" class="btn text-primary mx-2"><i
                          class="menu-icon tf-icons ti ti-edit"></i> Edit </Link>
                        <button class="btn text-danger  waves-effect waves-light" data-bs-toggle="modal"
                          data-bs-target="#server">
                          <i class="menu-icon tf-icons ti ti-trash"></i>
                          Delete
                        </button>
                        <!-- content delete -->
                        <div class="modal fade" id="server" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog modal-simple modal-dialog-centered">
                            <div class="modal-content p-3 p-md-5">
                              <div class="modal-body  d-flex flex-lg-column align-items-center">
                                <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal"
                                  aria-label="Close"></button>
                                <h4>Delete Content</h4>
                                <p>
                                  Are you sure you would like to do this?
                                </p>
                                <form id="serverForm" class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework"
                                  onsubmit="return false" novalidate="novalidate">
                                  <div class="d-flex ">
                                    <form @submit.prevent="submit(content.id)">
                                      <button type="reset" class="btn btn-label-secondary waves-effect"
                                        data-bs-dismiss="modal" aria-label="Close">
                                        Cancel
                                      </button> &nbsp;
                                      <button data-bs-dismiss="modal" class="btn btn-danger  waves-effect waves-light">
                                        <i class="menu-icon tf-icons ti ti-trash"></i>
                                        Delete
                                      </button>
                                    </form>
                                  </div>
                                  <input type="hidden">
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!--/ content delete -->
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- content list -->

    </template>

  </AppLayout>
</template>