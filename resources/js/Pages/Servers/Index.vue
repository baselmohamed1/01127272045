<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Head, Link, router, useForm } from "@inertiajs/vue3";
import { onMounted } from "vue";

defineProps({
    user: Object,
    servers: Object,
});

const form = useForm({
    csrf: "",
});

const submit = (server_id) => {
    form.delete(route('servers.delete', server_id), {
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
            <div class="container mt-5">
                <div class="card">
                    <div class="d-flex justify-content-between align-items-center card-header border-bottom">
                        <h5 class="card-title mb-0">Server List</h5>
                        <Link :href="route('servers.create')">
                        <div class="dt-buttons btn-group flex-wrap ">
                            <button class="btn btn-secondary add-new btn-primary" tabindex="0"
                                aria-controls="DataTables_Table_0" type="button" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasAddUser">
                                <span>
                                    <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i>
                                    <span class="d-none d-sm-inline-block">Add Server</span></span>
                                </button>
                        </div>
                        </Link>
                    </div>

                    <div class="card-datatable table-responsive">
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer m-3">
                            <table class="datatables-users table border-top dataTable no-footer dtr-column"
                                id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
                                <thead>
                                    <tr>
                                        <th>Server Name</th>

                                        <th>SSH Host Name</th>

                                        <th>SSH User</th>

                                        <th>Actions</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    <tr class="odd" v-for="server in servers">

                                        <td>{{ server.server_name }}</td>

                                        <td>{{ server.ssh_host_name }}</td>

                                        <td>{{ server.ssh_user_name }}</td>

                                        <td>
                                            <div class="d-flex">
                                                <Link :href="'/servers/' + server.id + '/edit'"
                                                    class="btn text-primary mx-2"><i
                                                    class="menu-icon tf-icons ti ti-edit"></i> Edit </Link>
                                                <button class="btn text-danger  waves-effect waves-light"
                                                    data-bs-toggle="modal" data-bs-target="#server">
                                                    <i class="menu-icon tf-icons ti ti-trash"></i>
                                                    Delete
                                                </button>
                                                <!-- Server delete -->
                                                <div class="modal fade" id="server" tabindex="-1" aria-hidden="true">
                                                    <div class="modal-dialog modal-simple modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div
                                                                class="modal-body d-flex flex-lg-column align-items-center">
                                                                <button type="button" class="btn-close btn-danger"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                                <h4>Delete Server</h4>
                                                                <p>
                                                                    Are you sure you would like to do this?
                                                                </p>
                                                                <form id="serverForm"
                                                                    class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework"
                                                                    onsubmit="return false" novalidate="novalidate">
                                                                    <div
                                                                        class="d-flex flex-direction-column align-items-center">
                                                                        <form @submit.prevent="submit(server.id)">

                                                                            <button type="reset"
                                                                                class="btn btn-label-secondary waves-effect"
                                                                                data-bs-dismiss="modal" aria-label="Close">
                                                                                Cancel
                                                                            </button> &nbsp;

                                                                            <button data-bs-dismiss="modal"
                                                                                class="btn btn-danger  waves-effect waves-light">
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
                                                <!--/ Server delete -->
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </AppLayout>
</template>
