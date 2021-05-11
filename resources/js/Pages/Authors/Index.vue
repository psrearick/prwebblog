<template>

    <div class="py-20">
        <div v-if="category" class="text-center pb-12">
            <h1 class="text-2xl font-bold text-center">{{ category.name }}</h1>
            <inertia-link class="text-yellow-500 text-sm" href="/posts/posts">View All Posts</inertia-link>
        </div>
        <div class="text-center p-4">
            <p class="text-xl mb-4">{{ author.name }}</p>
            <img :src="author.image_url" :alt="author.name" width="350" class="mx-auto mb-8">
            <p class="text-gray-500" v-html="author.bio" />
        </div>
        <PostListing v-for="(post, index) in posts" :post="post" :key="index" class="mb-4" :class="index < posts.length -1 ? 'border-b border-gray-200' : ''" />
        <Pagination :links_data="links" />
    </div>
</template>

<script>
import moment from "moment";
import Layout from "../../Shared/Layout";
import Pagination from "../../Shared/Components/Pagination";
import PostListing from "../../Shared/Components/PostListing";

export default {
    components: {Pagination, PostListing},
    layout: Layout,

    name: "authors-index",

    title: 'Posts',

    props: ['post_data', 'category', 'author', 'errors'],

    data: function() {
        return {
            posts: this.post_data.data,
            links: this.post_data.links,
        }
    },

    methods:  {
        format_date: function (date, format = 'YYYY MMM DD') {
            return moment(date).format(format);
        }
    }
}
</script>
