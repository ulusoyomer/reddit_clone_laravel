<template>
    <guest-layout>
        <section class="flex md:flex-row m-2 p-2">
            <div class="w-8/12">
                <post-card class="m-1"
                           v-for="post in posts.data"
                           :post="post"
                           :key="post.id"
                           :community="post.community_slug"
                />
            </div>
            <div class="w-4/12">
                <CommunityList :communities="communities.data">
                    <template #title>
                        Top Communities
                    </template>
                </CommunityList>
            </div>
        </section>
    </guest-layout>
</template>

<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import PostCard from "@/Components/PostCard.vue";
import CommunityList from "@/Components/CommunityList.vue";

defineProps({
    communities: Object,
    posts: Object,
})
</script>

