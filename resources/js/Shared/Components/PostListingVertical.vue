<template>

    <div class="py-6 flex flex-col">
        <img v-if="image" :src="post.image_url" :alt="post.title" class="rounded">

        <div class="flex flex-col justify-between flex-1">
            <div>
                <h3 class="pb-4">
                    <a :href="'/posts/posts/' +post.slug" class="text-4xl">{{post.title}}</a>
                </h3>
            </div>
            <div>
                <div class="text-gray-500 text-sm flex justify-between">
                    <div class="text-gray-500 text-sm">
                        {{ format_date(post.published_at, 'DD MMM YYYY') }}
                    </div>
                    <a class="hover:text-yellow-500" :href="'/authors/authors/' + post.author.id">{{ post.author.name }}</a>
                </div>
                <div>
                    <p class="text-sm pt-2 h-12 overflow-ellipsis overflow-hidden">
                        {{post.excerpt }}
                    </p>
                </div>
                <div class="my-4">
                    <a
                        class="px-6 py-1 border border-black rounded-full hover:text-yellow-500 hover:border-yellow-500"
                        :href="'/categories/categories/' + post.category.name"
                    >
                        {{post.category.name }}
                    </a>
                </div>
                <div class="pt-4">
                    <a
                        :href="'/posts/posts/' + post.slug"
                        class="py-2 px-4 border-2 border-black hover:bg-black hover:text-gray-100">
                        Continue Reading
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import moment from "moment";

export default {
    name: "PostListingVertical",

    props: ["post", "image"],

    methods:  {
        format_date: function (date, format = 'YYYY MMM DD') {
            return moment(date).format(format);
        }
    }
}
</script>

<style scoped>

</style>
