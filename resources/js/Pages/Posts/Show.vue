<template>
    <h1>{{ content.title }}</h1>
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
