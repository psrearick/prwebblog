<template>
    <div class="py-20">
        <div v-if="category" class="text-center pb-12">
            <h1 class="pb-8 text-2xl font-bold text-center">
                {{ category.name }}
            </h1>
        </div>
        <div class="flex mx-64">
            <Dropdown
                v-model:selected="selected"
                :options="categories"
                primary-key="id"
                label="name"
                dropdown-placeholder="Select a Category..."
                class="flex-1 -mt-0.5"
                @update:selected="updateSelected($event)"
            />
            <form
                action="#"
                method="get"
                class="p-0 m-0"
                @submit.prevent="updateSearchTerm"
            >
                <post-search-field
                    :model-value="searchTerm"
                    @update:model-value="updateSearchTerm"
                />
            </form>
        </div>
        <inertia-link
            v-if="category"
            class="text-yellow-500 text-sm text-center"
            href="/categories/categories"
            >View posts in all categories</inertia-link
        >
        <PostListing
            v-for="(postItem, index) in posts"
            :key="index"
            :post="postItem"
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
import PostSearchField from "../../Shared/Components/PostSearchField";

export default {
    name: "CategoriesIndex",
    components: { Pagination, PostListing, Dropdown, PostSearchField },

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
        post: {
            type: String,
            default: () => {},
        },
    },

    data: function () {
        return {
            posts: this.postData.data,
            links: this.postData.links,
            selected: null,
            searchTerm: "",
        };
    },

    created() {
        this.selected = this.category ? this.category : null;
        this.searchTerm = this.post;
    },

    methods: {
        updateSelected(event) {
            this.selected = event;
            this.search();
        },
        updateSearchTerm(term) {
            this.searchTerm = term;
            this.search();
        },
        search() {
            this.$inertia.get("/categories/search", {
                category: this.selected.id,
                post: this.searchTerm,
            });
        },
    },
};
</script>
