<template>
    <main :class="'flex flex-col min-h-screen ' + background">
        <FlashMessage />
        <header :class="background">
            <Header />
        </header>
        <article class="flex-1 w-full max-w-7xl mx-auto px-8">
            <slot />
        </article>
        <footer :class="background">
            <div class="max-w-7xl mx-auto px-2 sm:px-4 lg:px-8 py-4 mt-8">
                <p class="text-gray-400 text-xs text-center lg:text-left">
                    &copy; Copyright 2021 | Phillip Rearick | All Rights
                    Reserved
                </p>
            </div>
        </footer>
    </main>
</template>

<script>
import Header from "./Components/Header";
import FlashMessage from "./UI/FlashMessage";

export default {
    title: "Title",

    components: {
        Header: Header,
        FlashMessage: FlashMessage,
    },

    data() {
        return {
            background: "app-bg-default",
        };
    },

    created() {
        this.emitter.on("set-background", (background) => {
            this.background = background;
        });
    },
};
</script>
