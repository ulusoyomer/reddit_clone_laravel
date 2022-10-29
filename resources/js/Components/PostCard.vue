<template>
    <div class="mb-2 max-w-4xl flex rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
        <div class="mr-3">
            <PostVote :post="post"/>
        </div>
        <div>
            <div class="flex m-2 p-2 text-sm">
                <Link
                    :href="route('frontend.communities.show',community)"
                    class="font-semibold mr-3 hover:text-indigo-700"
                >
                    r/{{ community }}
                </Link>
                <div class="flex">Posted by
                    <span class="font-semibold ml-1">{{ post.username }}</span>
                    &nbsp;{{post.created_at}}
                </div>
            </div>
            <a :href="route('frontend.communities.post.show',[community,post.slug])">
                <h5
                    class="mb-2 ml-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white hover:text-indigo-700"
                >
                    {{ post.title }}
                </h5>
            </a>
            <p class="mb-3 ml-6 font-normal text-gray-700 dark:text-gray-400">{{ post.description }}</p>
            <div class="flex m-2 p-2">
                <p class="mr-4 p-2">Comments ({{ post.comments_count }})</p>
                <Link :href="route('frontend.communities.post.show',[community,post.slug])"
                      class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-indigo-700 rounded-md">
                    Read more
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-arrow-right-short ml-2 -mr-1 w-4 h-4" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                              d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                    </svg>
                </Link>
            </div>
        </div>
    </div>
</template>

<script setup>
import {Link} from "@inertiajs/inertia-vue3";
import PostVote from "@/Components/PostVote.vue";

defineProps({
    post: Object,
    community: String,
});
</script>
