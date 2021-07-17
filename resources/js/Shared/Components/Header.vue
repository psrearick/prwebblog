<template>
    <div>
        <div class="max-w-7xl mx-auto px-2 sm:px-4 lg:px-8">
            <div class="flex justify-between py-5">
                <span class="inline-block leading-10 align-middle">
                    <inertia-link href="/" class="font-bold text-yellow-600"
                        >PRWebBlog</inertia-link
                    >
                </span>
                <div class="flex">
                    <nav class="relative text-gray-500">
                        <span class="inline-block leading-10 align-middle">
                            <inertia-link href="/" class="hover:text-yellow-500"
                                >Home</inertia-link
                            >
                        </span>
                        <span class="inline-block leading-10 align-middle ml-8">
                            <inertia-link
                                href="/posts/posts"
                                class="hover:text-yellow-500"
                                >Posts</inertia-link
                            >
                        </span>
                    </nav>
                    <div class="ml-12">
                        <form
                            action="#"
                            method="get"
                            class="p-0 m-0"
                            @submit.prevent="search"
                        >
                            <post-search-field
                                :model-value="searchTerm"
                                :clear="true"
                                @update:model-value="search"
                            />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import store from "../store";
import PostSearchField from "./PostSearchField";

export default {
    name: "Header",

    components: { PostSearchField: PostSearchField },

    data: function () {
        return {
            searchTerm: "",
        };
    },

    methods: {
        search(term) {
            this.$nextTick(() => {
                this.searchTerm = "";
            });
            store.searchTerm = term;
            this.$inertia.get("/posts/search/" + term);
        },
    },
};
</script>
