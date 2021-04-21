<template>
    <div>
        <h1>Posts</h1>
    </div>
    <div>
        <h3><a href="/posts/my-first-post">My First Post</a></h3>
        <h3><a href="/posts/my-second-post">My Second Post</a></h3>
        <h3><a href="/posts/my-third-post">My Third Post</a></h3>
    </div>
</template>
<script>
import Layout from '@/Shared/Layout';

export default {
    layout: Layout,
    title: 'Home'
};
</script>
