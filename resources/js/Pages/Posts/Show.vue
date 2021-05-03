<template>
    <div class="pb-20">
        <div>
            <div class="text-center pt-8">
                <h1 class="font-bold text-4xl pb-4">{{ content.title }}</h1>
                <span class="text-gray-500">{{ content.excerpt }}</span>
            </div>
            <div class="text-center">
                <img :src="content.image_url" :alt="content.title" class="w-full p-8">
            </div>
        </div>
        <div class="p-8" v-html="content.body"/>
        <div class="flex justify-between">
            <a v-if="content.category" :href="'/posts/categories/' + content.category.slug" class="text-yellow-600 hover:text-black hover:font-bold">{{ content.category.name }}</a>
            <a v-if="content.category" :href="'/posts/authors/' + content.author.id" class="text-yellow-600 hover:text-black hover:font-bold">{{ content.author.name }}</a>
        </div>
    </div>
</template>

<script>
import Layout from "../../Shared/Layout";

export default {
    layout: Layout,
    name: "posts-show",
    props: ['content']
}
</script>
