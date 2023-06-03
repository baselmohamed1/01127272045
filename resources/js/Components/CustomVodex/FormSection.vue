<script setup>
import { computed, useSlots } from 'vue';
import SectionTitle from './SectionTitle.vue';

defineEmits(['submitted']);

const hasActions = computed(() => !!useSlots().actions);
</script>

<template>
    <div class="row">
        <SectionTitle>
            <template #title>
                <slot name="title" />
            </template>
            <template #description>
                <slot name="description" />
            </template>
        </SectionTitle>

        <div class="col-lg-6">
                <form @submit.prevent="$emit('submitted')" class="mb-3 fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
                    <div class="" :class="hasActions ? '' : ''">
                            <slot name="form" />
                    </div>

                    <div v-if="hasActions" class="d-flex align-items-center">
                        <slot name="actions" />
                    </div>



                </form>
        </div>
    </div>
</template>
