<template>
    <div class="grid grid-cols-4 py-6">
        <div>
            <div class="text-gray-500 text-sm">
                <div class="text-xl">
                    {{ format_date(post.published_at, "DD") }}
                </div>
                <div>
                    {{ format_date(post.published_at, "MMM YYYY") }}
                </div>
            </div>
        </div>
        <div class="col-span-2">
            <h3>
                <inertia-link
                    :href="'/posts/posts/' + post.slug"
                    class="text-2xl"
                    >{{ post.title }}</inertia-link
                >
            </h3>
            <div>
                <p class="text-sm">
                    By
                    <inertia-link
                        class="text-gray-500 hover:text-yellow-500"
                        :href="'/authors/authors/' + post.author.id"
                        >{{ post.author.name }}</inertia-link
                    >
                    in
                    <inertia-link
                        class="text-gray-500 hover:text-yellow-500"
                        :href="'/categories/categories/' + post.category.name"
                        >{{ post.category.name }}</inertia-link
                    >
                </p>
                <p class="text-sm pt-2">
                    {{ post.excerpt }}
                </p>
            </div>
        </div>
        <div class="flex flex-col justify-around">
            <div>
                <inertia-link
                    :href="'/posts/posts/' + post.slug"
                    class="
                        py-2
                        px-4
                        border-2 border-black
                        float-right
                        hover:bg-black hover:text-gray-100
                    "
                    >Continue Reading</inertia-link
                >
            </div>
        </div>
    </div>
</template>

<script>
import FormatDateMixin from "../Mixins/FormatDateMixin";

export default {
    name: "PostListing",

    mixins: [FormatDateMixin],

    props: {
        post: {
            type: Object,
            default: () => {},
        },
    },
};
</script>

<style scoped></style>
