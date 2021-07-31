<template>
    <div class="py-6 flex flex-col">
        <img
            v-if="image"
            :src="post.image_url"
            :alt="post.title"
            class="rounded"
        />

        <div class="flex flex-col justify-between flex-1">
            <div>
                <h3 class="pb-4">
                    <a :href="'/posts/posts/' + post.slug" class="text-4xl">{{
                        post.title
                    }}</a>
                </h3>
            </div>
            <div>
                <div class="text-gray-500 text-sm flex justify-between">
                    <div class="text-gray-500 text-sm">
                        {{ format_date(post.published_at, "DD MMM YYYY") }}
                    </div>
                    <p
                        class="hover:text-yellow-500 cursor-pointer"
                        @click="viewAuthor(post.author)"
                    >
                        {{ post.author.name }}
                    </p>
                </div>
                <div>
                    <p
                        class="
                            text-sm
                            pt-2
                            h-12
                            overflow-ellipsis overflow-hidden
                        "
                    >
                        {{ post.excerpt }}
                    </p>
                </div>
                <div class="my-4">
                    <p
                        class="
                            px-6
                            py-1
                            border border-black
                            inline
                            cursor-pointer
                            rounded-full
                            hover:text-yellow-500 hover:border-yellow-500
                        "
                        @click="viewCategory(post.category)"
                    >
                        {{ post.category.name }}
                    </p>
                </div>
                <div class="pt-4">
                    <a
                        :href="'/posts/posts/' + post.slug"
                        class="
                            py-2
                            px-4
                            border-2 border-black
                            hover:bg-black hover:text-gray-100
                        "
                    >
                        Continue Reading
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import FormatDateMixin from "../Mixins/FormatDateMixin";
import FilteredPostMethodsMixin from "../Mixins/FilteredPostMethodsMixin";

export default {
    name: "PostListingVertical",

    mixins: [FormatDateMixin, FilteredPostMethodsMixin],

    props: {
        post: {
            type: Object,
            default: () => {},
        },
        image: {
            type: Boolean,
            default: false,
        },
    },
};
</script>

<style scoped></style>
