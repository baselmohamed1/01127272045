<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { onMounted } from 'vue';
import { router } from '@inertiajs/vue3';
import axios from 'axios';

const props = defineProps({
  packages: Object,
})

onMounted(() => {

  let payPalJS = document.getElementById('paypal-js')
  if (payPalJS != null) {
    payPalJS.remove()
  }

  let payPalScript = document.createElement('script')
  payPalScript.setAttribute('src', 'https://www.paypal.com/sdk/js?client-id=Aeir2MDVcZXBvFbV_v3dIPShCu1dSkLsxA1bGDa0cCjEYqmaZqxsngFRcE0h6ltCH8Z_EsWNx8qWqwGn&vault=true&intent=subscription')
  payPalScript.setAttribute('id', 'paypal-js')
  document.body.appendChild(payPalScript)

  function initPaypal() {
    const FUNDING_SOURCES = [
      paypal.FUNDING.PAYPAL,
      paypal.FUNDING.CARD
    ];
    props.packages.forEach(plan => {
      FUNDING_SOURCES.forEach(fundingSource => {
        paypal.Buttons({
          fundingSource,
          style: {
            layout: 'vertical',
            shape: 'pill',
            color: (fundingSource == paypal.FUNDING.PAYLATER) ? 'gold' : '',
          },

          createSubscription: (data, actions) => {
            return actions.subscription.create({
              plan_id: plan.paypal_plan_id,
            });
          },

          onApprove: async (data, actions) => {
            console.log(data);
            axios.post(route('subscription.result', data.subscriptionID), data)
              .then((response) => {
                console.log(response);
                router.visit('/subscription-successful')
              }, (error) => {
                console.log(error);
              });
          },
        })
          .render("#paypal-button-container-" + plan.paypal_plan_id)
      })
    })
  }

  setTimeout(initPaypal, 200)

})

</script>

<template>
  <AppLayout title="Dashboard">
    <template #header>
      <!-- Content wrapper -->
      <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
          <div class="card">
            <!--Purchase Addon Pricing Plans -->
            <div class="pb-sm-5 pb-2 rounded-top">
              <div class="container py-5">
                <h2 class="text-center mb-2 mt-0 mt-md-4">Purchase Addon Pricing Plans</h2>
                <div class="row mx-0 gy-3  mt-3 px-lg-5">
                  <!-- Basic -->
                  <div class="col-lg mb-md-0 mb-4" v-for="plan in props.packages">
                    <div class="card border rounded shadow-none">
                      <div class="card-body">
                        <h3 class="card-title fw-semibold text-center text-capitalize mb-1">{{
                          plan.name }}
                        </h3>
                        <div class="text-center">
                          <div class="d-flex justify-content-center">
                            <sup class="h6 pricing-currency mt-3 mb-0 me-1 text-primary">$</sup>
                            <h1 class="fw-semibold display-4 mb-0 text-primary">{{ plan.price }}
                            </h1>
                            <sub class="h6 pricing-duration mt-auto mb-2 text-muted fw-normal">/month</sub>
                          </div>
                        </div>
                        <ul class="ps-3 my-4 pt-2">
                          <li class="mb-2">{{ plan.content_count }} Content</li>
                          <li class="mb-2">{{ plan.server_count }} Server</li>
                        </ul>
                        <div :id="'paypal-button-container-' + plan.paypal_plan_id"></div>

                      </div>
                    </div>
                  </div>
                  <div>
                  </div>
                </div>
              </div>
            </div>
            <!--/Purchase Addon Pricing Plans -->
          </div>
        </div>
        <!-- / Content -->
      </div>
      <!-- Content wrapper -->
    </template>
  </AppLayout>
</template>

