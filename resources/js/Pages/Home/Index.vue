<template>
    <div class="grid grid-cols-3 pt-20">
        <div>
            <h1 class="text-4xl">What's New?</h1>
            <p class="w-2/3 pt-4">the latest in news on a variety of web development topics</p>
        </div>
        <div class="col-span-2">
            <div v-for="post in posts" :key="post.slug" class="mb-4 border-b border-gray-200">
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
                            <a :href="'/posts/' + post.slug" class="text-2xl">{{ post.title}}</a>
                        </h3>
                        <div>
                            <p class="text-sm pt-2">
                                {{ post.excerpt }}
                            </p>

                        </div>
                    </div>
                    <div class="flex flex-col justify-around">
                        <div>
                            <a :href="'/posts/' + post.slug" class="py-2 px-4 border-2 border-black float-right hover:bg-black hover:text-gray-100">Continue Reading</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center pt-8">
                <a :href="'/posts/'" class="bg-gray-300 py-2 px-4 hover:bg-black hover:text-gray-100">Explore More</a>
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
