<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { ref, onMounted } from "vue";

const props = defineProps({
  stats: Object
});

const movies_percent = ref(null);
const series_percent = ref(null);

onMounted(() => {
  movies_percent.value = props.stats.used_movies_count / props.stats.available_content_count * 100;
  series_percent.value = props.stats.used_series_count / props.stats.available_content_count * 100;
});

</script>

<template>
  <AppLayout title="Dashboard">
    <template #header>
      <div class="container mt-3">
        <div class="row">
          <!-- Server count -->
          <div class="col-xl-2 col-sm-12 col-md-4 col-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="badge p-2 bg-label-danger mb-2 rounded">
                  <i class="ti ti-chart-bar ti-md"></i>
                </div>
                <h5 class="card-title mb-1 pt-2">Server</h5>
                <small class="text-muted">Count</small>

                <div class="pt-1">
                  <span class="badge bg-label-secondary">{{ props.stats.used_server_count }} / {{
                    props.stats.available_server_count }}</span>
                </div>
              </div>
            </div>
          </div>
          <!--/ server count -->

          <div class="col-xl-3 col-sm-6 mb-4">
            <div class="card">
              <div class="card-body">
                <h6>Content Count</h6>
                <div class="row mt-4">
                  <!-- Movie count -->
                  <div class="col-4">
                    <div class="d-flex gap-2 align-items-center mb-2">
                      <span class="badge bg-label-info p-1 rounded"><i class="ti ti-unlink ti-xs"></i></span>
                      <p class="mb-0">Movie</p>
                    </div>
                    <h5 class="mb-0 pt-1">{{ props.stats.used_movies_count }}</h5>
                  </div>
                  <!-- Movie count -->

                  <div class="col-4">
                    <div class="divider divider-vertical">
                      <div class="divider-text">
                        <span class="badge-divider-bg bg-label-secondary">VS</span>
                      </div>
                    </div>
                  </div>

                  <!-- Series count -->
                  <div class="col-4 text-end">
                    <div class="d-flex gap-2 justify-content-end align-items-center mb-2">
                      <p class="mb-0">Series</p>
                      <span class="badge bg-label-primary p-1 rounded"><i class="ti ti-link ti-xs"></i></span>
                    </div>
                    <h5 class="mb-0 pt-1">{{ props.stats.used_series_count }}</h5>
                  </div>
                  <!-- Series count -->
                </div>
                <div class="d-flex align-items-center mt-4">
                  <div class="progress w-100" style="height: 8px">
                    <div class="progress-bar bg-info" :style="'width: ' + movies_percent + '%'" role="progressbar"></div>
                    <div class="progress-bar bg-primary" role="progressbar" :style="'width: ' + series_percent + '%'">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Exprire -->
          <div class="col-xl-2 col-md-4 col-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="badge p-2 bg-label-warning mb-2 rounded"><i class="ti ti-user"></i></div>
                <h5 class="card-title  pt-2">Expiry</h5>
                <small class="text-muted">Date</small>
                <div class="pt-1">
                  <span class="badge bg-label-secondary">{{ props.stats.expiry_date }}</span>
                </div>
              </div>
            </div>
          </div>
          <!-- Exprire-->
        </div>
      </div>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <Welcome />
        </div>
      </div>
    </div>
  </AppLayout></template>
