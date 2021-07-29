function getTitle(vm) {
    const { title } = vm.$options;
    if (title) {
        return typeof title === "function" ? title.call(vm) : title;
    }
}
export default {
    data() {
        return {
            title: "",
        };
    },

    created() {
        const title = getTitle(this);
        if (title) {
            document.title = title;
        }
    },

    watch: {
        title(newTitle) {
            document.title = newTitle;
        },
    },
};
