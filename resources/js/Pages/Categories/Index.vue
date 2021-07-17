<template>
    <div class="py-20">
        <div v-if="category" class="text-center pb-12">
            <h1 class="pb-8 text-2xl font-bold text-center">
                {{ category.name }}
            </h1>
        </div>
        <Dropdown
            v-model:selected="selected"
            :options="categories"
            primary-key="id"
            label="name"
            dropdown-placeholder="Select a Category..."
            @update:selected="updateSelected($event)"
        />
        <inertia-link
            v-if="category"
            class="text-yellow-500 text-sm text-center"
            href="/categories/categories"
            >View posts in all categories</inertia-link
        >
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
import Layout from "../../Shared/Layout";
import Pagination from "../../Shared/Components/Pagination";
import PostListing from "../../Shared/Components/PostListing";
import Dropdown from "../../Shared/UI/Dropdown";

export default {
    name: "CategoriesIndex",
    components: { Pagination, PostListing, Dropdown },

    layout: Layout,

    title: "Posts",

    props: {
        categories: {
            type: Array,
            default: () => {},
        },
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
            selected: null,
        };
    },

    created() {
        this.selected = this.category ? this.category : null;
    },

    methods: {
        updateSelected(event) {
            this.selected = event;
            this.$inertia.get("/categories/categories/" + event.name);
        },
    },
};
</script>
