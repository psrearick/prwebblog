<template>
    <div class="grid grid-cols-4 py-6 gap-x-4">
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
                >
                    {{ post.title }}
                </inertia-link>
            </h3>
            <div>
                <div class="text-sm text-gray-500 flex space-x-1">
                    <p>By</p>
                    <p
                        class="hover:text-yellow-500 cursor-pointer"
                        @click="viewAuthor(post.author)"
                    >
                        {{ post.author.name }}
                    </p>
                    <p>in</p>
                    <p
                        class="hover:text-yellow-500 cursor-pointer"
                        @click="viewCategory(post.category)"
                    >
                        {{ post.category.name }}
                    </p>
                </div>
                <p class="text-sm pt-2 px-4">
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
                >
                    Continue Reading
                </inertia-link>
            </div>
        </div>
    </div>
</template>

<script>
import FormatDateMixin from "../Mixins/FormatDateMixin";
import FilteredPostMethodsMixin from "../Mixins/FilteredPostMethodsMixin";

export default {
    name: "PostListing",

    mixins: [FormatDateMixin, FilteredPostMethodsMixin],

    props: {
        post: {
            type: Object,
            default: () => {},
        },
    },
};
</script>

<style scoped></style>
