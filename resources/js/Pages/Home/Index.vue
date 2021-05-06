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
        <div class="flex p-20 bg-gray-100 rounded my-8">
            <div class="pr-8 w-1/2">
                <img :src="featuredPost.image_url" :alt="featuredPost.title" class="rounded">
            </div>
            <div class="w-1/2">
                <h3 class="pb-4">
                    <a :href="'/posts/posts/' +featuredPost.slug" class="text-4xl">{{featuredPost.title}}</a>
                </h3>
                <div class="text-gray-500 text-sm flex justify-between">
                    <div class="text-gray-500 text-sm">
                        {{ format_date(featuredPost.published_at, 'DD MMM YYYY') }}
                    </div>
                    <a class="hover:text-yellow-500" :href="'/authors/authors/' + featuredPost.author.id">{{ featuredPost.author.name }}</a>
                </div>
                <div>
                    <p class="text-sm pt-2">
                        {{featuredPost.excerpt }}
                    </p>
                </div>
                <div class="my-4">
                    <a
                        class="px-6 py-1 border border-black rounded-full hover:text-yellow-500 hover:border-yellow-500"
                        :href="'/categories/categories/' + featuredPost.category.slug"
                    >
                        {{featuredPost.category.name }}
                    </a>
                </div>
                <div class="pt-4">
                    <a
                        :href="'/posts/posts/' + featuredPost.slug"
                        class="py-2 px-4 border-2 border-black hover:bg-black hover:text-gray-100">
                        Continue Reading
                    </a>
                </div>
            </div>
        </div>
        <div class="flex pb-8">
            <PostListingVertical v-for="(post, index) in primaryPosts" :post="post" :key="index" :image="true" class="p-8 w-1/2" />
        </div>
        <PostListing v-for="(post, index) in secondaryPosts" :post="post" :key="index" class="mb-4" :class="index < posts.length -1 ? 'border-b border-gray-200' : ''" />
        <div class="text-center pt-8">
            <a :href="'/posts/posts'" class="bg-gray-300 py-2 px-4 hover:bg-black hover:text-gray-100">Explore More</a>
        </div>
    </div>
</template>
<script>
import Layout from '@/Shared/Layout';
import moment from "moment";
import PostListing from "../../Shared/Components/PostListing";
import PostListingVertical from "../../Shared/Components/PostListingVertical";

export default {
    layout: Layout,

    title: 'Home',

    components: {PostListing, PostListingVertical},

    props: ['posts'],

    data() {
        return {
            primaryPostCount: 3,
            featuredPost: {},
            primaryPosts: [],
            secondaryPosts: [],
        }
    },

    created() {
        let allPosts = _.cloneDeep(this.posts);
        if (allPosts) {
            this.featuredPost = allPosts.shift();
        }
        for (let i = 0; i < this.primaryPostCount; i++) {
            if (allPosts) {
                this.primaryPosts.push(allPosts.shift());
            }
        }
        this.secondaryPosts = allPosts;
    },

    methods:  {
        format_date: function (date, format = 'YYYY MMM DD') {
            return moment(date).format(format);
        }
    }
};

</script>
