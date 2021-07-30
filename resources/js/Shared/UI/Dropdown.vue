<template>
    <div>
        <div class="mt-1 relative">
            <button
                type="button"
                class="
                    z-10
                    bg-gray-100
                    relative
                    w-full
                    rounded-md
                    shadow-sm
                    pl-3
                    pr-10
                    py-2
                    text-left
                    cursor-default
                    focus:outline-none
                    focus:ring-1
                    focus:ring-indigo-500
                    focus:border-indigo-500
                    sm:text-sm
                "
                aria-haspopup="listbox"
                aria-expanded="true"
                aria-labelledby="listbox-label"
                @click="active = !active"
            >
                <span class="block truncate">
                    {{ selectedItem ? selectedItem.name : dropdownPlaceholder }}
                </span>
                <span
                    class="
                        absolute
                        inset-y-0
                        right-0
                        flex
                        items-center
                        pr-2
                        pointer-events-none
                    "
                >
                    <svg
                        class="h-5 w-5 text-gray-400"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                        aria-hidden="true"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                            clip-rule="evenodd"
                        />
                    </svg>
                </span>
            </button>

            <!--
              Select popover, show/hide based on select state.

              Entering: ""
                From: ""
                To: ""
              Leaving: "transition ease-in duration-100"
                From: "opacity-100"
                To: "opacity-0"
            -->
            <transition
                leave-active-class="transition ease-in duration-100"
                leave-from-class="opacity-100"
                leave-to-class="opacity-0"
            >
                <ul
                    v-if="active"
                    class="
                        absolute
                        z-10
                        mt-1
                        w-full
                        bg-white
                        shadow-lg
                        max-h-60
                        rounded-md
                        py-1
                        text-base
                        ring-1 ring-black ring-opacity-5
                        overflow-auto
                        focus:outline-none
                        sm:text-sm
                    "
                    tabindex="-1"
                    role="listbox"
                >
                    <!--
                      Select option, manage highlight styles based on mouseenter/mouseleave and keyboard navigation.

                      Highlighted: "text-white bg-indigo-600", Not Highlighted: "text-gray-900"
                    -->
                    <li
                        v-for="(option, index) in options"
                        id="listbox-option-0"
                        :key="index"
                        class="
                            text-gray-900
                            cursor-default
                            select-none
                            relative
                            py-2
                            pl-3
                            pr-9
                        "
                        role="option"
                        @click="selectOption(option)"
                    >
                        <span
                            class="block truncate"
                            :class="
                                selectedItem &&
                                selectedItem[primaryKey] === option[primaryKey]
                                    ? 'font-semibold'
                                    : 'font-normal'
                            "
                        >
                            {{ option[label] }}
                        </span>

                        <span
                            v-if="
                                selectedItem &&
                                selectedItem[primaryKey] === option[primaryKey]
                            "
                            class="
                                text-indigo-600
                                absolute
                                inset-y-0
                                right-0
                                flex
                                items-center
                                pr-4
                            "
                        >
                            <!-- Heroicon name: solid/check -->
                            <svg
                                class="h-5 w-5"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                                aria-hidden="true"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                        </span>
                    </li>
                </ul>
            </transition>
        </div>
        <div
            v-if="active"
            class="h-full w-full absolute top-0 left-0"
            @click="active = false"
        />
    </div>
</template>

<script>
export default {
    name: "Dropdown",

    props: {
        options: {
            type: Array,
            default: () => {},
        },
        primaryKey: {
            type: Number,
            default: null,
        },
        label: {
            type: String,
            default: "",
        },
        selected: {
            type: Object,
            default: () => {},
        },
        dropdownPlaceholder: {
            type: Text,
            default: "Select an Option...",
        },
    },

    emits: ["update:selected"],

    data() {
        return {
            active: false,
            selectedItem: {},
        };
    },

    mounted() {
        this.selectedItem = Object.keys(this.selected).length
            ? this.selected
            : null;
        if (!this.selectedItem && !this.dropdownPlaceholder && this.options.length) {
            // this.selectOption(this.options[0]);
            this.selectedItem = this.options[0];
        }
    },

    methods: {
        selectOption(option) {
            this.selectedItem = option;
            this.active = false;
            this.$emit("update:selected", option);
        },
    },
};
</script>

<style scoped></style>
