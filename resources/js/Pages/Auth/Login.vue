<template>
    <main
        class="
            max-w-lg
            mt-10
            p-6
            bg-gray-200
            mx-auto
            border border-gray-200
            rounded-md
        "
    >
        <h1 class="text-center font-bold mb-8">Log In</h1>
        <form @submit.prevent="submit">
            <div class="mb-6">
                <label
                    class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    for="email"
                >
                    Email
                </label>
                <input
                    id="email"
                    v-model="form.email"
                    class="border border-gray-400 p-2 w-full"
                    type="email"
                    name="email"
                    required
                />
                <span v-if="errors.email" class="text-sm text-red-700">{{
                        errors.email
                    }}</span>
            </div>
            <div class="mb-6">
                <label
                    class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    for="password"
                >Password</label
                >
                <input
                    id="password"
                    v-model="form.password"
                    class="border border-gray-400 p-2 w-full"
                    type="password"
                    name="password"
                    required
                />
                <span v-if="errors.password" class="text-sm text-red-700">{{
                        errors.password
                    }}</span>
            </div>
            <div class="mb-6 flex justify-end">
                <inertia-link
                    href="/"
                    class="
                        py-2
                        px-4
                        border-2 border-black
                        float-right
                        text-gray-700
                        hover:bg-black hover:text-gray-100
                        mr-4
                    "
                >
                    Cancel
                </inertia-link>
                <button
                    class="
                        py-2
                        px-4
                        border-2 border-black
                        float-right
                        text-black
                        hover:bg-yellow-500
                    "
                    @click.prevent="submit"
                >
                    Log In
                </button>
            </div>
        </form>
    </main>
</template>

<script>
import Layout from "../../Shared/Layout";

export default {
    name: "Login",

    layout: Layout,

    props: {
        errors: {
            type: Object,
            default: () => {},
        },
    },

    data() {
        return {
            form: {
                email: "",
                password: "",
            },
        };
    },

    methods: {
        submit() {
            this.$inertia.post("/auth/login", this.form);
        },
    },
}
</script>

<style scoped>

</style>
