<template>
    <div>
        <input
            v-model="term"
            type="text"
            name="search"
            placeholder="Find something"
            class="ml-8 bg-gray-200 rounded-l-md py-2 px-4 focus:outline-none"
            @enter="search"
        />
        <button
            type="submit"
            class="
                py-2
                px-4
                rounded-r-md
                bg-yellow-500
                hover:bg-yellow-700
                focus:outline-none
            "
            @click.prevent="search"
        >
            Go
        </button>
    </div>
</template>

<script>
export default {
    name: "PostSearchField",

    props: {
        modelValue: {
            type: String,
            default: "",
        },
        clear: {
            type: Boolean,
            default: false,
        },
    },

    emits: ["update:modelValue"],

    data() {
        return {
            term: "",
        };
    },

    mounted() {
        this.term = this.modelValue;
    },

    methods: {
        search() {
            this.$emit("update:modelValue", this.term);
            if (this.clear) {
                this.term = "";
            }
        },
    },
};
</script>
