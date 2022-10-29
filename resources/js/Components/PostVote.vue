<template>
    <div class="w-12 flex flex-col h-full p-2 bg-slate-200 text-center rounded-lg">
        <UpVoteLink
            :slug="post.slug"
            :class="{'text-blue-600' : post.postVotes[0] && post.postVotes[0].vote === 1}"/>
        <div
            class="font-bold"
            :class="{'text-blue-600' : post.postVotes[0] && post.postVotes[0].vote === 1,
                     'text-red-600' : post.postVotes[0] && post.postVotes[0].vote === -1}"
        >
            {{ post.votes }}
        </div>
        <DownVoteLink
            :slug="post.slug"
            :class="{'text-red-600' : post.postVotes[0] && post.postVotes[0].vote === -1}"/>
    </div>
</template>

<script setup>

import UpVoteLink from "@/Components/UpVoteLink.vue";
import DownVoteLink from "@/Components/DownVoteLink.vue"

defineProps({
    post: Object
});

</script>

<style>

</style>
