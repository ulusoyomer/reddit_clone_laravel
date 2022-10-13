<template>
    <guest-layout>
        <section class="flex md:flex-row m-2 p-2">
            <div class="w-8/12">
                <h1>
                    {{post.title}}
                </h1>
                Post Details
                <div class="mt-4 p-2">

                </div>
            </div>
            <div class="w-4/12">
                <div class="m-2 p-2 bg-slate-500 text-white">
                    <h2>Latest Communities</h2>
                </div>
            </div>
        </section>
    </guest-layout>
</template>

<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import {Link} from "@inertiajs/inertia-vue3";

defineProps({
    community: Object,
    post: String,
})
</script>

