<script setup>
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
const logout = () => {
  router.post(route("logout"));
};

</script>

<template>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->

      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo mt-3">
          <a href="#" class="app-brand-link">
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
            <span class="app-brand-text demo menu-text fw-bold">Vodex</span>
          </a>

          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
          </a>
        </div>

        <div class="menu-inner-shadow"></div>

        <ul class="menu-inner py-1 mt-3">
          <!-- Page -->
          <li :class="['menu-item', route().current('dashboard') ? 'active' : null,]">
            <Link href="/dashboard" class="menu-link">
            <i class="menu-icon tf-icons ti ti-home"></i>
            <div data-i18n="Page 1">Dashboard</div>
            </Link>
          </li>

          <li :class="[
            'menu-item',
            route().current('contents.index') ? 'active' : null,
            route().current('contents.create') ? 'active' : null,
            route().current('contents.edit') ? 'active' : null,
          ]">
            <Link href="/contents" class="menu-link">
            <i class="menu-icon tf-icons ti ti-unlink"></i>
            <div data-i18n="Page 1">Contents</div>
            </Link>
          </li>

          <li :class="[
            'menu-item',
            route().current('servers.index') ? 'active' : null,
            route().current('servers.create') ? 'active' : null,
            route().current('servers.edit') ? 'active' : null,
          ]">
            <Link href="/servers" class="menu-link">
            <i class="menu-icon tf-icons ti ti-server "></i>
            <div data-i18n="Page 1">Servers</div>
            </Link>
          </li>
        </ul>
      </aside>
      <!-- / Menu -->

      <!-- Layout container -->
      <div class="layout-page">

        <!-- Navbar -->
        <nav
          class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
          id="layout-navbar">
          <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
              <i class="ti ti-menu-2 ti-sm"></i>
            </a>
          </div>

          <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <div class="navbar-nav align-items-center">
              <a class="nav-link style-switcher-toggle hide-arrow" href="javascript:void(0);">
                <i class="ti ti-sm"></i>
              </a>
            </div>

            <ul class="navbar-nav flex-row align-items-center ms-auto">
              <!-- User -->
              <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                  <div class="avatar avatar-online">
                    <img src="/assets/img/avatars/1.png" alt class="h-auto rounded-circle" />
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                    <a class="dropdown-item" href="#">
                      <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                          <div class="avatar avatar-online">
                            <img src="/assets/img/avatars/1.png" alt class="h-auto rounded-circle" />
                          </div>
                        </div>
                        <div class="flex-grow-1">
                          <span class="fw-semibold d-block">{{ $page.props.auth.user.name }}</span>
                          <small class="text-muted">Admin</small>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                  </li>
                  <!-- <li>
                    <a class="dropdown-item" href="profile">
                      <i class="ti ti-user-check me-2 ti-sm"></i>
                      <span class="align-middle">My Profile</span>
                    </a>
                  </li> -->

                  <li>
                    <Link class="dropdown-item" href="/purchase-addon">
                    <i class="ti ti-unlink me-2 ti-sm"></i>
                    <span class="align-middle">Purchase Addon</span>
                    </Link>
                  </li>

                  <li>
                    <a class="dropdown-item" href="/price">
                      <i class="ti ti-currency-rupee me-2 ti-sm"></i>
                      <span class="align-middle">Pricing Plan</span>
                    </a>
                  </li>

                  <li>
                    <Link class="dropdown-item" href="/accountsettings/account">
                    <i class="ti ti-settings me-2 ti-sm"></i>
                    <span class="align-middle">Settings</span>
                    </Link>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#" @click="logout">
                      <i class="ti ti-logout me-2 ti-sm"></i>
                      <span class="align-middle">Log Out</span>
                    </a>
                  </li>
                </ul>
              </li>
              <!--/ User -->
            </ul>
          </div>
        </nav>

        <!-- / Navbar -->

        <div class="">
          <slot name='header' />

        </div>
        <!-- Content wrapper -->
        <div class="content-wrapper">
        </div>
      </div>
    </div>
  </div>
  <!-- / Content -->
</template>
