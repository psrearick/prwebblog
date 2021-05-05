<template>
    <div class="py-10">
        <div class="text-center">
            <h1 class="text-2xl">What's New?</h1>
            <div class="text-gray-500">
                <p class="pt-2">the latest news in the web development world</p>
                <p class="pt-2">discussions on a wide range of develop topics</p>
                <p class="pt-2">instruction on proper application of coding principles in the context of fun projects</p>
            </div>
        </div>
        <div class="pt-10">
            <div v-for="(post, key) in posts" :key="post.slug" class="mb-4">
                <div v-if="key === 0">
                    <div class="flex p-20 bg-gray-100 rounded">
                        <div class="pr-8 w-1/2">
                            <img :src="post.image_url" :alt="post.title" class="rounded">
                        </div>
                        <div class="w-1/2">
                            <h3 class="pb-4">
                                <a :href="'/posts/posts/' + post.slug" class="text-4xl">{{ post.title}}</a>
                            </h3>
                            <a
                                class="px-6 py-1 border border-black rounded-full hover:text-yellow-500 hover:border-yellow-500"
                                :href="'/categories/categories/' + post.category.slug"
                            >
                                {{ post.category.name }}
                            </a>
                            <div class="pt-4">
                                <p class="text-sm pt-2">
                                    {{ post.excerpt }}
                                </p>
                            </div>
                            <div class="text-gray-500 text-sm flex justify-between pt-2">
                                <div class="text-gray-500 text-sm">
                                    {{ format_date(post.published_at, 'DD MMM YYYY') }}
                                </div>
                                <a class="hover:text-yellow-500" :href="'/authors/authors/' + post.author.id">{{ post.author.name }}</a>
                            </div>
                            <div class="pt-8">
                                    <a
                                        :href="'/posts/posts/' + post.slug"
                                        class="py-2 px-4 border-2 border-black hover:bg-black hover:text-gray-100">
                                        Continue Reading
                                    </a>
                            </div>
                        </div>
                    </div>
                </div>


                <div v-else class="grid grid-cols-4 py-6 border-b border-gray-200">
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
            <div class="text-center pt-8">
                <a :href="'/posts/posts'" class="bg-gray-300 py-2 px-4 hover:bg-black hover:text-gray-100">Explore More</a>
            </div>
        </div>
    </div>
</template>
<script>
import Layout from '@/Shared/Layout';
import moment from "moment";

export default {
    layout: Layout,

    title: 'Home',

    props: ['posts'],

    methods:  {
        format_date: function (date, format = 'YYYY MMM DD') {
            return moment(date).format(format);
        }
    }
};

</script>
