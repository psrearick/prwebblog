<template>
    <div v-html="content"/>
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
