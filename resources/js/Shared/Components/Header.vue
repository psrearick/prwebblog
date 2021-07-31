<template>
    <div>
        <div class="max-w-7xl mx-auto px-4 lg:px-8">
            <div class="flex justify-between py-5">
                <span class="inline-block leading-10 align-middle">
                    <inertia-link href="/" class="font-bold text-yellow-600"
                        >PRWebBlog</inertia-link
                    >
                </span>
                <div class="flex">
                    <nav class="relative text-gray-500">
                        <!--                        <span class="inline-block leading-10 align-middle">-->
                        <!--                            <inertia-link href="/" class="hover:text-yellow-500"-->
                        <!--                                >Home</inertia-link-->
                        <!--                            >-->
                        <!--                        </span>-->
                        <span class="inline-block leading-10 align-middle ml-6">
                            <inertia-link
                                href="/posts/search"
                                class="hover:text-yellow-500"
                            >
                                Posts
                            </inertia-link>
                        </span>
                        <!--                        <span class="inline-block leading-10 align-middle ml-6">-->
                        <!--                            <inertia-link-->
                        <!--                                href="/categories/categories"-->
                        <!--                                class="hover:text-yellow-500"-->
                        <!--                                >Categories</inertia-link-->
                        <!--                            >-->
                        <!--                        </span>-->
                        <span class="inline-block leading-10 align-middle ml-6">
                            <span v-if="$page.props.auth.guest">
                                <inertia-link
                                    href="/auth/register"
                                    class="hover:text-yellow-500"
                                >
                                    Register
                                </inertia-link>
                                <inertia-link
                                    href="/auth/login"
                                    class="hover:text-yellow-500 ml-6"
                                >
                                    Log In
                                </inertia-link>
                            </span>
                            <inertia-link
                                v-else
                                href="/auth/logout"
                                class="hover:text-yellow-500 focus:outline-none"
                                method="post"
                                as="button"
                                type="button"
                            >
                                Log Out
                            </inertia-link>
                        </span>
                    </nav>
                    <!--                    <div class="ml-12">-->
                    <!--                        <form-->
                    <!--                            action="#"-->
                    <!--                            method="get"-->
                    <!--                            class="p-0 m-0"-->
                    <!--                            @submit.prevent="search"-->
                    <!--                        >-->
                    <!--                            <post-search-field-->
                    <!--                                :model-value="searchTerm"-->
                    <!--                                :clear="true"-->
                    <!--                                @update:model-value="search"-->
                    <!--                            />-->
                    <!--                        </form>-->
                    <!--                    </div>-->
                </div>
            </div>
        </div>
    </div>
</template>

<script>
// import store from "../store";
// import PostSearchField from "./PostSearchField";

export default {
    name: "Header",

    // components: { PostSearchField: PostSearchField },

    // data: function () {
    //     return {
    //         searchTerm: "",
    //     };
    // },

    // methods: {
    //     search(term) {
    //         this.$nextTick(() => {
    //             this.searchTerm = "";
    //         });
    //         store.searchTerm = term;
    //         this.$inertia.get("/posts/search/", {
    //             post: term,
    //         });
    //     },
    // },
};
</script>
