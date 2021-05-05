<template>

    <div class="py-20">
        <div v-if="category" class="text-center pb-12">
            <h1 class="text-2xl font-bold text-center">{{ category.name }}</h1>
            <inertia-link class="text-yellow-500 text-sm" href="/posts/posts">View All Posts</inertia-link>
        </div>
        <div v-for="(post, index) in posts" :key="post.slug" class="mb-4" :class="index < posts.length -1 ? 'border-b border-gray-200' : ''">
            <div class="grid grid-cols-4 py-6">
                <div>
                    <div class="text-gray-500 text-sm">
                        <div class="text-xl">
                            {{ format_date(post.published_at, 'DD') }}
                        </div>
                        <div>
                            {{ format_date(post.published_at, 'MMM YYYY') }}
                        </div>
                    </div>
                </div>
                <div class="col-span-2">
                    <h3>
                        <inertia-link :href="'/posts/posts/' + post.slug" class="text-2xl">{{ post.title}}</inertia-link>
                    </h3>
                    <div>
                        <p class="text-sm">
                            By <inertia-link class="text-gray-500 hover:text-yellow-500" :href="'/authors/authors/' + post.author.id">{{ post.author.name }}</inertia-link>
                            in <inertia-link class="text-gray-500 hover:text-yellow-500" :href="'/categories/categories/' + post.category.slug">{{ post.category.name }}</inertia-link>
                        </p>
                        <p class="text-sm pt-2">
                            {{ post.excerpt }}
                        </p>

                    </div>
                </div>
                <div class="flex flex-col justify-around">
                    <div>
                        <inertia-link :href="'/posts/posts/' + post.slug" class="py-2 px-4 border-2 border-black float-right hover:bg-black hover:text-gray-100">Continue Reading</inertia-link>
                    </div>
                </div>
            </div>
        </div>
        <Pagination :links_data="links" />
    </div>
</template>

<script>
import moment from "moment";
import Layout from "../../Shared/Layout";
import Pagination from "../../Shared/Components/Pagination";

export default {
    components: {Pagination},
    layout: Layout,

    name: "categories-index",

    title: 'Posts',

    props: ['post_data', 'category'],

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

<style scoped>

</style>
