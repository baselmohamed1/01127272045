<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    links: Object,
    first_page_url: String,
    last_page_url: String,
    current_page: Number,
    first_page: Number,
    last_page: Number,
});

</script>

<template>

    <div class="demo-inline-spacing">

        <nav v-if="links.length > 3" aria-label="Page navigation">
            <ul class="pagination">

                <li v-if="current_page > first_page" class="page-item first">
                    <Link class="page-link" :href="first_page_url">
                    <i class="ti ti-chevrons-left ti-xs"></i>
                    </Link>
                </li>
                <template v-for="(link, p) in links" :key="p">
                    <li class="page-item" v-if="link.url === null">
                    </li>
                    <li v-else class="page-item" :class="{ 'active' : link.active }">
                        <a class="page-link" v-if="link.active" href="javascript:void(0);"  v-html="link.label">
                        </a>
                        <Link class="page-link" v-else  :href="link.url" v-html="link.label">
                        </Link>
                    </li>
                </template>
                <li v-if="current_page < last_page" class="page-item last">
                    <Link class="page-link" :href="last_page_url">
                    <i class="ti ti-chevrons-right ti-xs"></i>
                    </Link>
                </li>

            </ul>
        </nav>
    </div>

</template>
<script>
export default {
    props: {
        links: Array
    },
}
</script>