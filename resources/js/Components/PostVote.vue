<template>
    <div class="w-12 flex flex-col m-2 p-2">
        <Link :href="route('posts.upVote',post)"
              method="post"
              as="button"
              type="button"
              class="text-gra-400 hover:text-blue-500">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 19.5v-15m0 0l-6.75 6.75M12 4.5l6.75 6.75"/>
            </svg>
        </Link>
        <div>4k</div>
        <Link :href="route('posts.downVote',post)"
              method="post"
              as="button"
              type="button"
              class="text-gra-400 hover:text-red-500">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 13.5L12 21m0 0l-7.5-7.5M12 21V3"/>
            </svg>
        </Link>
    </div>
</template>

<script setup>
import {Link} from "@inertiajs/inertia-vue3";

defineProps({
    post: String
});

</script>

<style>

</style>
