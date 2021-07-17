<template>
    <div class="py-20">
        <div v-if="category" class="text-center pb-12">
            <h1 class="text-2xl font-bold text-center">{{ category.name }}</h1>
            <inertia-link class="text-yellow-500 text-sm" href="/posts/posts"
                >View All Posts</inertia-link
            >
        </div>
        <form action="#" method="get" class="p-0 m-0" @submit.prevent="search">
            <post-search-field
                :model-value="searchTerm"
                @update:model-value="search"
            />
        </form>
        <PostListing
            v-for="(post, index) in posts"
            :key="index"
            :post="post"
            class="mb-4"
            :class="index < posts.length - 1 ? 'border-b border-gray-200' : ''"
        />
        <Pagination :links-data="links" />
    </div>
</template>

<script>
import store from "../../Shared/store";
import Layout from "../../Shared/Layout";
import Pagination from "../../Shared/Components/Pagination";
import PostListing from "../../Shared/Components/PostListing";
import PostSearchField from "../../Shared/Components/PostSearchField";

export default {
    name: "PostsIndex",

    components: {
        PostListing,
        Pagination,
        PostSearchField,
    },

    layout: Layout,

    title: "Posts",

    props: {
        category: {
            type: Object,
            default: () => {},
        },
        postData: {
            type: Object,
            default: () => {},
        },
    },

    data: function () {
        return {
            posts: this.postData.data,
            links: this.postData.links,
            searchTerm: "",
        };
    },

    created() {
        this.searchTerm = store.searchTerm;
    },

    methods: {
        search(term) {
            this.searchTerm = term;
            store.searchTerm = this.searchTerm;
            this.$inertia.get("/posts/search/" + this.searchTerm);
        },
    },
};
</script>
