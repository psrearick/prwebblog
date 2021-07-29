<template>
    <div class="pb-20">
        <section>
            <article>
                <div>
                    <div class="text-center pt-8">
                        <h1 class="font-bold text-4xl pb-4">
                            {{ content.title }}
                        </h1>
                        <span class="text-gray-500">{{ content.excerpt }}</span>
                    </div>
                    <div class="text-center">
                        <img
                            :src="content.image_url"
                            :alt="content.title"
                            class="w-full p-8"
                        />
                    </div>
                </div>
                <div class="p-8" v-html="content.body" />
                <div class="flex justify-between">
                    <a
                        v-if="content.category"
                        :href="
                            '/categories/categories/' + content.category.name
                        "
                        class="text-yellow-600 hover:text-black hover:font-bold"
                        >{{ content.category.name }}</a
                    >
                    <a
                        v-if="content.category"
                        :href="'/authors/authors/' + content.author.id"
                        class="text-yellow-600 hover:text-black hover:font-bold"
                        >{{ content.author.name }}</a
                    >
                </div>
            </article>
        </section>
        <section class="mt-10 space-y-4">
            <form
                action="#"
                method="post"
                class="border border-gray-200 p-6 rounded-xl"
                @submit.prevent="submit"
            >
                <header class="flex items-center">
                    <div
                        v-if="!$page.props.auth.guest"
                        class="flex-shrink-0 mr-4"
                    >
                        <img
                            :src="`https://i.pravatar.cc/100?u=${$page.props.auth.user.id}`"
                            alt=""
                            height="50"
                            width="50"
                            class="rounded-full"
                        />
                    </div>
                    <h2>Want to leave a comment?</h2>
                    <div v-if="$page.props.auth.guest" class="ml-1">
                        <inertia-link
                            href="/auth/register"
                            class="hover:text-yellow-500 font-bold"
                            >Register</inertia-link
                        >
                        <span class="mx-1">or</span>
                        <inertia-link
                            href="/auth/login"
                            class="hover:text-yellow-500 font-bold"
                            >Login</inertia-link
                        >
                    </div>
                </header>
                <div v-if="!$page.props.auth.guest" class="mt-8">
                    <textarea
                        v-model="comment"
                        name="body"
                        class="
                            w-full
                            text-sm
                            p-4
                            mb-2
                            focus:outline-none focus:ring-yellow-500
                            ring ring-gray-100
                            rounded-xl
                        "
                        placeholder="What do you want to say?"
                        cols="30"
                        rows="10"
                    />
                    <span v-if="errors.body" class="text-sm text-red-700">{{
                        errors.body
                    }}</span>
                </div>
                <div v-if="!$page.props.auth.guest" class="mt-4">
                    <button
                        class="
                            py-2
                            px-4
                            text-white
                            bg-black
                            hover:text-black hover:bg-yellow-500
                            rounded-xl
                        "
                        @click.prevent="submit"
                    >
                        Post
                    </button>
                </div>
            </form>
            <PostComment
                v-for="(commentModel, index) in content.comments"
                :key="index"
                :comment="commentModel"
            />
        </section>
    </div>
</template>

<script>
import Layout from "../../Shared/Layout";
import PostComment from "../../Shared/Components/PostComment";

export default {
    name: "PostsShow",

    components: { PostComment: PostComment },

    layout: Layout,

    title: "Post",

    props: {
        content: {
            type: Object,
            default: () => {},
        },
        errors: {
            type: Object,
            default: () => {},
        },
    },

    data() {
        return {
            comment: "",
        };
    },

    mounted() {
        this.title = this.content.title;
    },

    methods: {
        submit() {
            this.$inertia.post(
                `/posts/posts/${this.content.slug}/comments`,
                { body: this.comment },
                {
                    onSuccess: () => {
                        this.comment = "";
                    },
                }
            );
        },
    },
};
</script>
