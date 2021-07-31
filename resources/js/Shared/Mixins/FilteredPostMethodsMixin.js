export default {
    methods: {
        viewAuthor(author) {
            this.$inertia.get("/posts/search", {
                filters: {
                    author: author.id,
                },
            });
        },
        viewCategory(category) {
            this.$inertia.get("/posts/search", {
                filters: {
                    category: category.id,
                },
            });
        },
    },
};
