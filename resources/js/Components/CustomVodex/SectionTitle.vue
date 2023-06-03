<template>
    <div class="col-lg-6">
        <div class="">
            <h5>
                <slot name="title" />
            </h5>

            <p class="">
                <slot name="description" />
            </p>
        </div>

        <div class="">
            <slot name="aside" />
        </div>
    </div>
</template>
