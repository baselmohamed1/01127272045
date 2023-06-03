<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head, Link, router } from '@inertiajs/vue3';
import { onMounted } from 'vue';

// const showingNavigationDropdown = ref(false);
onMounted(() => {

  setTimeout(appendMenuJS, 100);
  setTimeout(appendMainJS, 500);

  function appendMenuJS() {
    let menuJS = document.getElementById('menu-js')
    if (menuJS != null) {
      menuJS.remove()
    }

    let menuScript = document.createElement('script')
    menuScript.setAttribute('src', '/assets/js/menu.js')
    menuScript.setAttribute('id', 'menu-js')
    document.body.appendChild(menuScript)
  }

  function appendMainJS() {
    let mainJS = document.getElementById('main-js')
    if (mainJS != null) {
      // delete(menu)
      mainJS.remove()
    }

    let mainScript = document.createElement('script')
    mainScript.setAttribute('src', '/assets/js/main.js')
    mainScript.setAttribute('id', 'main-js')
    document.body.appendChild(mainScript)
  }
})


</script>

<template>
  <AppLayout title="Dashboard">
    <template #header>
      <!-- contents -->
      <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Security</h4>

        <div class="row">
          <div class="col-md-12">
            <ul class="nav nav-pills flex-column flex-md-row mb-4">
              <li class="nav-item">
                <Link class="nav-link" href="/accountsettings/account"><i class="ti-xs ti ti-users me-1"></i> Account
                </Link>
              </li>
              <li class="nav-item">
                <Link class="nav-link active" href="/accountsettings/security"><i class="ti-xs ti ti-lock me-1"></i>
                Security</Link>
              </li>

            </ul>
            <!-- Change Password -->
            <div class="card mb-4">
              <h5 class="card-header">Change Password</h5>
              <div class="card-body">
                <form id="formAccountSettings" method="POST" onsubmit="return false"
                  class="fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
                  <div class="row">
                    <div class="mb-3 col-md-6 form-password-toggle fv-plugins-icon-container">
                      <label class="form-label" for="currentPassword">Current Password</label>
                      <div class="input-group input-group-merge has-validation">
                        <input class="form-control" type="password" name="currentPassword" id="currentPassword"
                          placeholder="enter current password">
                        <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                      </div>
                      <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="mb-3 col-md-6 form-password-toggle fv-plugins-icon-container">
                      <label class="form-label" for="newPassword">New Password</label>
                      <div class="input-group input-group-merge has-validation">
                        <input class="form-control" type="password" id="newPassword" name="newPassword"
                          placeholder="enter new password">
                        <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                      </div>
                      <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>

                    <div class="mb-3 col-md-6 form-password-toggle fv-plugins-icon-container">
                      <label class="form-label" for="confirmPassword">Confirm New Password</label>
                      <div class="input-group input-group-merge has-validation">
                        <input class="form-control" type="password" name="confirmPassword" id="confirmPassword"
                          placeholder="enter confirm new password">
                        <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                      </div>
                      <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                    <div class="col-12 mb-4">
                      <h6>Password Requirements:</h6>
                      <ul class="ps-3 mb-0">
                        <li class="mb-1">Minimum 8 characters long - the more, the better</li>
                        <li class="mb-1">At least one lowercase character</li>
                        <li>At least one number, symbol, or whitespace character</li>
                      </ul>
                    </div>
                    <div>
                      <button type="submit" class="btn btn-primary me-2 waves-effect waves-light">Save changes</button>
                      <button type="reset" class="btn btn-label-secondary waves-effect">Cancel</button>
                    </div>
                  </div>
                  <input type="hidden">
                </form>
              </div>
            </div>
            <!--/ Change Password -->

            <!-- Two-steps verification -->
            <div class="card mb-4">
              <h5 class="card-header">Two-steps verification</h5>
              <div class="card-body">
                <h6 class="fw-semibold mb-3">Two factor authentication is not enabled yet.</h6>
                <p class="w-50">
                  Two-factor authentication adds an additional layer of security to your account by requiring more
                  than just a password to log in.
                  <a href="javascript:void(0);">Learn more.</a>
                </p>
                <button class="btn btn-primary mt-2 waves-effect waves-light" data-bs-toggle="modal"
                  data-bs-target="#enableOTP">
                  Enable two-factor authentication
                </button>
              </div>
            </div>
            <!-- Modal -->
            <!-- Enable OTP Modal -->
            <div class="modal fade" id="enableOTP" tabindex="-1" aria-hidden="true">
              <div class="modal-dialog modal-simple modal-enable-otp modal-dialog-centered">
                <div class="modal-content p-3 p-md-5">
                  <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                      <h3 class="mb-2">Enable One Time Password</h3>
                      <p>Verify Your Mobile Number for SMS</p>
                    </div>
                    <p>
                      Enter your mobile phone number with country code and we will send you a verification code.
                    </p>
                    <form id="enableOTPForm" class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework"
                      onsubmit="return false" novalidate="novalidate">
                      <div class="col-12 fv-plugins-icon-container">
                        <label class="form-label" for="modalEnableOTPPhone">Phone Number</label>
                        <div class="input-group has-validation">
                          <span class="input-group-text">IND (+91)</span>
                          <input type="text" id="modalEnableOTPPhone" name="modalEnableOTPPhone"
                            class="form-control phone-number-otp-mask" placeholder="000 0000 000">
                        </div>
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                      </div>
                      <div class="col-12">
                        <button type="submit"
                          class="btn btn-primary me-sm-3 me-1 waves-effect waves-light">Submit</button>
                        <button type="reset" class="btn btn-label-secondary waves-effect" data-bs-dismiss="modal"
                          aria-label="Close">
                          Cancel
                        </button>
                      </div>
                      <input type="hidden">
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!--/ Enable OTP Modal -->

            <!-- /Modal -->
          </div>
        </div>
      </div>
      <!-- contents -->

    </template>

  </AppLayout>
</template>