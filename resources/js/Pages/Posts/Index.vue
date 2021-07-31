<template>
    <div>
        <h1 class="py-10 text-2xl font-bold text-center">Posts</h1>
        <div :class="topContentClass">
            <div :class="filterClass">
                <Dropdown
                    v-model:selected="selectedAuthor"
                    :options="authorOptions"
                    primary-key="id"
                    label="name"
                    :dropdown-placeholder="null"
                    :class="`-mt-0.5 ${filterComponentClass}`"
                    @update:selected="updateAuthor($event)"
                />
                <Dropdown
                    v-model:selected="selectedCategory"
                    :options="categoryOptions"
                    primary-key="id"
                    label="name"
                    :dropdown-placeholder="null"
                    :class="`-mt-0.5 ${filterComponentClass}`"
                    @update:selected="updateCategory($event)"
                />
                <form
                    action="#"
                    method="get"
                    :class="filterComponentClass"
                    @submit.prevent="updateSearch"
                >
                    <PostSearchField
                        :model-value="searchTerm"
                        @update:model-value="updateSearch"
                    />
                </form>
            </div>
            <Card
                v-if="categoryContent || authorContent"
                class="flex flex-col space-y-2"
            >
                <div v-if="authorContent">
                    <h2 class="font-bold text-sm">Author</h2>
                    <h3 class="text-lg mb-2">{{ author.name }}</h3>
                    <p v-html="author.bio" />
                </div>
                <div v-if="categoryContent">
                    <h2 class="font-bold text-sm">Category</h2>
                    <h3 class="text-lg mb-2">{{ category.name }}</h3>
                    <p v-html="category.description" />
                </div>
            </Card>
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
import Card from "../../Shared/UI/Card";

export default {
    name: "PostsIndex",

    components: {
        Dropdown,
        PostListing,
        Pagination,
        PostSearchField,
        Card,
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
            default: "",
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

    computed: {
        topContentClass() {
            if (this.authorContent || this.categoryContent) {
                return "grid grid-cols-1 md:grid-cols-2 gap-y-4 md:gap-y-0 md:gap-x-10 mb-8";
            }
            return "";
        },
        filterClass() {
            if (this.authorContent || this.categoryContent) {
                // return 'grid grid-cols-1 gap-y-4';
                return "flex flex-col gap-y-4";
            }
            return "flex flex-col gap-y-4 md:gap-y-0 md:gap-x-4 md:flex-row";
            // return 'grid grid-cols-1 gap-y-4 md:gap-y-0 md:grid-cols-3 md:gap-x-4';
        },
        filterComponentClass() {
            if (this.authorContent || this.categoryContent) {
                return "";
            }
            return "md:flex-1";
        },
        authorContent() {
            if (!this.author) {
                return false;
            }
            if (typeof this.author === "undefined") {
                return false;
            }
            if (!this.author.bio.length) {
                return false;
            }

            return true;
        },
        categoryContent() {
            if (!this.category) {
                return false;
            }
            if (typeof this.category === "undefined") {
                return false;
            }
            if (!this.category.description.length) {
                return false;
            }

            return true;
        },
    },

    created() {
        this.searchTerm = this.term;
        this.selectedCategory = this.category || {};
        this.selectedAuthor = this.author || {};
        let categories = _.cloneDeep(this.categories);
        categories.unshift({
            id: -1,
            name: "All Categories",
        });
        this.categoryOptions = categories;
        let authors = _.cloneDeep(this.authors);
        authors.unshift({
            id: -1,
            name: "All Authors",
        });
        this.authorOptions = authors;
    },

    methods: {
        search() {
            this.$inertia.get("/posts/search/", {
                filters: {
                    post: this.searchTerm,
                    category: this.selectedCategory.id,
                    author: this.selectedAuthor.id,
                },
            });
        },
        updateAuthor(event) {
            this.selectedAuthor = event;
            this.search();
        },
        updateCategory(event) {
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
