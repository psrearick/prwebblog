<template>
    <div>
        <div class="text-center pt-8">
            <h1 class="font-bold text-4xl pb-4">{{ content.title }}</h1>
            <span class="text-gray-500">{{ content.excerpt }}</span>
        </div>
        <div class="text-center">
            <img :src="content.image_url" :alt="content.title" class="w-full p-8">
        </div>
    </div>
    <a v-if="content.category" :href="'/categories/' + content.category.slug">{{ content.category.name }}</a>
    <div v-html="content.body"/>
    <a href="/">Back</a>
</template>

<script>
import Layout from "../../Shared/Layout";

export default {
    layout: Layout,
    name: "posts-show",
    props: ['content']
}
</script>
