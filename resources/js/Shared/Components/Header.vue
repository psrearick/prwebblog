<template>
    <div>
        <div class="max-w-7xl mx-auto px-2 sm:px-4 lg:px-8">
            <div class="flex justify-between py-5">
                <span class="inline-block leading-10 align-middle">
                    <inertia-link href="/" class="font-bold text-yellow-600">PRWebBlog</inertia-link>
                </span>
                <div class="flex">
                    <nav class="relative text-gray-500">
                        <span class="inline-block leading-10 align-middle">
                            <inertia-link href="/" class="hover:text-yellow-500">Home</inertia-link>
                        </span>
                        <span class="inline-block leading-10 align-middle ml-8">
                            <inertia-link href="/posts/posts" class="hover:text-yellow-500">Posts</inertia-link>
                        </span>
                    </nav>
                    <div class="ml-12">
                        <form action="#" method="get" class="p-0 m-0" @submit.prevent="search">
                            <input
                                type="text"
                                name="search"
                                placeholder="Find something"
                                class="bg-gray-200 rounded-l-md py-2 px-4 focus:outline-none"
                                v-model="searchTerm"
                            >
                            <button type="submit" class="py-2 px-4 rounded-r-md bg-yellow-500 hover:bg-yellow-700 focus:outline-none">Go</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import store from "../store";

export default {
    name: "Header",

    data: function() {
        return {
            searchTerm: '',
        };
    },

    methods: {
        search() {
            const term = this.searchTerm;
            this.searchTerm = '';
            store.searchTerm = term;
            this.$inertia.get('/posts/search/' + term);
        }
    },
}
</script>
