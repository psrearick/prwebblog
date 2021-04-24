<template>
    <div class="py-20">
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
                        <a :href="'/posts/posts/' + post.slug" class="text-2xl">{{ post.title}}</a>
                    </h3>
                    <div>
                        <p class="text-sm pt-2">
                            {{ post.excerpt }}
                        </p>

                    </div>
                </div>
                <div class="flex flex-col justify-around">
                    <div>
                        <a :href="'/posts/posts/' + post.slug" class="py-2 px-4 border-2 border-black float-right hover:bg-black hover:text-gray-100">Continue Reading</a>
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

    name: "posts-index",

    title: 'Posts',

    props: ['post_data'],

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
