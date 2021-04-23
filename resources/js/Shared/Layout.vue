<template>
    <main :class="'min-h-screen ' + background">
        <header class="app-bg-default">
            <div class="max-w-7xl mx-auto px-2 sm:px-4 lg:px-8">
                <div class="flex justify-between py-5">
                    <inertia-link href="/" class="font-bold">PRWebBlog</inertia-link>
                    <nav>
                        <inertia-link href="/" class="hover:text-gray-500">Home</inertia-link>
                    </nav>
                </div>
            </div>
        </header>
        <article class="max-w-7xl mx-auto px-8">
            <slot />
        </article>
    </main>
</template>

<script>
export default {
    title: 'Title',
    data() {
        return {
            background: 'app-bg-default',
        }
    },
    created() {
        this.emitter.on("set-background", background => {
            this.background = background;
        });
    },
}
</script>
