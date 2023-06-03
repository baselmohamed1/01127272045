<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head, Link, router } from '@inertiajs/vue3';
import {  useForm, usePage } from '@inertiajs/vue3';
import { onMounted } from "vue";



const user = usePage().props.auth.user;

const form = useForm({
    name: user.name,
    email: user.email,
});

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
      <!-- contents -->
      <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4>

        <div class="row fv-plugins-icon-container">
          <div class="col-md-12">
            <ul class="nav nav-pills flex-column flex-md-row mb-4">
              <li class="nav-item">
                <Link class="nav-link active" href="#"><i class="ti-xs ti ti-users me-1"></i> Account</Link>
              </li>
              <li class="nav-item">
                <Link class="nav-link" href="/accountsettings/security"><i class="ti-xs ti ti-lock me-1"></i> Security
                </Link>
              </li>

            </ul>
            <div class="card mb-4">
              <h5 class="card-header">Profile Details</h5>
              <!-- Account -->
              <div class="card-body">
                <div class="d-flex align-items-start align-items-sm-center gap-4">
                  <img src="/assets/img/avatars/1.png" alt="user-avatar" class="d-block w-px-100 h-px-100 rounded"
                    id="uploadedAvatar">
                  <div class="button-wrapper">
                    <label for="upload" class="btn btn-primary me-2 mb-3 waves-effect waves-light" tabindex="0">
                      <span class="d-none d-sm-block">Upload new photo</span>
                      <i class="ti ti-upload d-block d-sm-none"></i>
                      <input type="file" id="upload" class="account-file-input" hidden="" accept="image/png, image/jpeg">
                    </label>
                    <button type="button" class="btn btn-label-secondary account-image-reset mb-3 waves-effect">
                      <i class="ti ti-refresh-dot d-block d-sm-none"></i>
                      <span class="d-none d-sm-block">Reset</span>
                    </button>

                    <div class="text-muted">Allowed JPG, GIF or PNG. Max size of 800K</div>
                  </div>
                </div>
              </div>
              <hr class="my-0">
              <div class="card-body">
                <form id="formAccountSettings" method="POST" onsubmit="return false"
                  class="fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
                  <div class="row">
                    <div class="mb-3 col-md-6 fv-plugins-icon-container">
                      <label for="name" class="form-label"> Name</label>
                      <input class="form-control" type="text" id="name" name="name" value="" autofocus=""
                        placeholder="name" :message="form.errors.name">
                      <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                   
                    <div class="mb-3 col-md-6">
                      <label for="email" class="form-label">E-mail</label>
                      <input class="form-control" type="text" id="email" name="email" value=""
                        placeholder="enter your email">
                    </div>
                    <div class="mb-3 col-md-6 form-password-toggle">
                        <label class="form-label" for="basic-default-password32">Password</label>
                        <div class="input-group input-group-merge">
                          <input type="password" class="form-control" id="basic-default-password32" placeholder="password" aria-describedby="basic-default-password">
                          <span class="input-group-text cursor-pointer" id="basic-default-password"><i class="ti ti-eye-off"></i></span>
                        </div>
                      </div>
                    <!-- <div class="mb-3 col-md-6">
                      <label class="form-label" for="phoneNumber">Phone Number</label>
                      <div class="input-group input-group-merge">
                        <span class="input-group-text">IND (+91)</span>
                        <input type="text" id="phoneNumber" name="phoneNumber" class="form-control"
                          placeholder="000 000 0000">
                      </div>
                    </div> -->
                    <!-- <div class="mb-3 col-md-6">
                      <label for="address" class="form-label">Address</label>
                      <input type="text" class="form-control" id="address" name="address" placeholder="Address">
                    </div> -->
                    <!-- <div class="mb-3 col-md-6">
                      <label for="state" class="form-label">State</label>
                      <input class="form-control" type="text" id="state" name="state" placeholder="TN">
                    </div> -->
                    <!-- <div class="mb-3 col-md-6">
                      <label for="zipCode" class="form-label">Zip Code</label>
                      <input type="text" class="form-control" id="zipCode" name="zipCode" placeholder="000000"
                        maxlength="6">
                    </div> -->
                  </div>

                  <div class="mt-2">
                    <button type="submit" class="btn btn-primary me-2 waves-effect waves-light">Save changes</button>
                    <button type="reset" class="btn btn-label-secondary waves-effect">Cancel</button>
                  </div>
                  <input type="hidden">
                </form>
              </div>
              <!-- /Account -->
            </div>
            <div class="card">
              <h5 class="card-header">Delete Account</h5>
              <div class="card-body">
                <div class="mb-3 col-12 mb-0">
                  <div class="alert alert-warning">
                    <h5 class="alert-heading mb-1">Are you sure you want to delete your account?</h5>
                    <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
                  </div>
                </div>
                <form id="formAccountDeactivation" onsubmit="return false"
                  class="fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
                  <div class="form-check mb-4">
                    <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation">
                    <label class="form-check-label" for="accountActivation">I confirm my account deactivation</label>
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                  </div>
                  <button type="submit" class="btn btn-danger deactivate-account waves-effect waves-light">Deactivate
                    Account</button>
                  <input type="hidden">
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    <!-- contents -->

  </template>

</AppLayout></template>