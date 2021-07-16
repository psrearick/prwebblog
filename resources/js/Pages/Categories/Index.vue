<template>

    <div class="py-20">
        <div v-if="category" class="text-center pb-12">
            <h1 class="pb-8 text-2xl font-bold text-center">{{ category.name }}</h1>
        </div>
        <Dropdown
            :options="categories"
            primary-key="id"
            label="name"
            v-bind:selected.sync="selected"
            v-on:update:selected="updateSelected($event)"
        />
        <inertia-link v-if="category" class="text-yellow-500 text-sm text-center" href="/categories/categories">View All Posts</inertia-link>
        <PostListing v-for="(post, index) in posts" :post="post" :key="index" class="mb-4" :class="index < posts.length -1 ? 'border-b border-gray-200' : ''" />
        <Pagination :links_data="links" />
    </div>
</template>

<script>
import Layout from "../../Shared/Layout";
import Pagination from "../../Shared/Components/Pagination";
import PostListing from "../../Shared/Components/PostListing";
import Dropdown from "../../Shared/UI/Dropdown";

export default {
    components: {Pagination, PostListing, Dropdown},

    layout: Layout,

    name: "categories-index",

    title: 'Posts',

    props: ['post_data', 'category', 'categories'],

    data: function() {
        return {
            posts: this.post_data.data,
            links: this.post_data.links,
            selected: null,
        }
    },

    created() {
        this.selected = this.category ? this.category : null;
    },

    methods:  {
        updateSelected(event) {
            this.selected = event;
            this.$inertia.get('/categories/categories/' + event.name);
        }
    }
}
</script>
