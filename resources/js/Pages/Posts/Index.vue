<template>
    <div>
        <h1 class="py-10 text-2xl font-bold text-center">Posts</h1>
        <div class="flex w-2/3 mx-auto">
            <Dropdown
                v-model:selected="selectedCategory"
                :options="categoryOptions"
                primary-key="id"
                label="name"
                :dropdown-placeholder="null"
                class="flex-1 -mt-0.5"
                @update:selected="updateCategory($event)"
            />
            <Dropdown
                v-model:selected="selectedAuthor"
                :options="authorOptions"
                primary-key="id"
                label="name"
                :dropdown-placeholder="null"
                class="flex-1 -mt-0.5 ml-8"
                @update:selected="updateAuthor($event)"
            />
            <form
                action="#"
                method="get"
                class="p-0 m-0"
                @submit.prevent="updateSearch"
            >
                <PostSearchField
                    :model-value="searchTerm"
                    @update:model-value="updateSearch"
                />
            </form>
        </div>
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
import PostSearchField from "../../Shared/Components/PostSearchField";
import Dropdown from "../../Shared/UI/Dropdown";

export default {
    name: "PostsIndex",

    components: {
        Dropdown,
        PostListing,
        Pagination,
        PostSearchField,
    },

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
        authors: {
            type: Array,
            default: () => {},
        },
        author: {
            type: Object,
            default: () => {},
        },
        postData: {
            type: Object,
            default: () => {},
        },
        term: {
            type: String,
            default: {},
        },
    },

    data: function () {
        return {
            links: this.postData.links,
            posts: this.postData.data,
            searchTerm: "",
            selectedCategory: null,
            categoryOptions: [],
            selectedAuthor: null,
            authorOptions: [],
        };
    },

    created() {
        this.searchTerm = this.term;
        this.selectedCategory = this.category || {};
        this.selectedAuthor = this.author || {};
        let categories = _.cloneDeep(this.categories);
         categories.unshift({
            id: -1,
            name: 'All Categories',
        });
        this.categoryOptions = categories;
        let authors = _.cloneDeep(this.authors);
        authors.unshift({
            id: -1,
            name: 'All Authors',
        });
        this.authorOptions = authors;
    },

    methods: {
        search() {
            console.log('search');
            this.$inertia.get("/posts/search/", {
                filters: {
                    post: this.searchTerm,
                    category: this.selectedCategory.id,
                    author: this.selectedAuthor.id,
                },
            });
        },
        updateAuthor(event) {
            console.log(event);
            // if (event.id < 0) {
            //     return;
            // }
            this.selectedAuthor = event;
            this.search();
        },
        updateCategory(event) {
            console.log(event);
            // if (event.id < 0) {
            //     return;
            // }
            this.selectedCategory = event;
            this.search();
        },
        updateSearch(term) {
            this.searchTerm = term;
            this.search();
        },
    },
};
</script>
