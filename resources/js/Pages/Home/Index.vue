<template>
    <div>
        <h1>Posts</h1>
    </div>
    <div v-for="post in posts" :key="post.slug">
        <h3>
            <a :href="'/posts/' + post.slug">{{ post.title}} </a>
        </h3>
        <div>
            {{ post.excerpt }}
        </div>
    </div>
</template>
<script>
import Layout from '@/Shared/Layout';

export default {
    layout: Layout,
    title: 'Home',
    props: ['posts']
};
</script>
