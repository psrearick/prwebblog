<template>
    <Card class="space-x-4">
        <div class="flex-shrink-0">
            <img
                :src="`https://i.pravatar.cc/100?u=${comment.author.id}`"
                alt=""
                height="100"
                width="100"
                class="rounded-xl"
            />
        </div>
        <div>
            <header class="mb-4">
                <h3 class="font-bold">{{ comment.author.username }}</h3>
                <p class="text-xs">
                    Posted
                    <time>{{
                        format_date(comment.created_at, "MMMM DD YYYY")
                    }}</time>
                </p>
            </header>
            <p v-html="comment.body" />
        </div>
    </Card>
</template>

<script>
import Card from "../UI/Card";
import FormatDateMixin from "../Mixins/FormatDateMixin";
export default {
    name: "PostComment",

    components: { Card },

    mixins: [FormatDateMixin],

    props: {
        comment: {
            type: Object,
            default: () => {},
        },
    },
};
</script>

<style scoped></style>
