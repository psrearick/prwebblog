<template>
    <main class="max-w-lg mt-10 p-6 bg-gray-200 mx-auto border border-gray-200 rounded-md">
        <h1 class="text-center font-bold mb-8">Register</h1>
        <form @submit.prevent="submit">
            <div class="mb-6">
                <label
                    class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    for="name"
                >
                    Name
                </label>
                <input
                    v-model="form.name"
                    class="border border-gray-400 p-2 w-full"
                    type="text"
                    name="name"
                    id="name"
                    required
                >
                <span v-if="errors.name" class="text-sm text-red-700">{{ errors.name }}</span>
            </div>
            <div class="mb-6">
                <label
                    class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    for="username"
                >
                    Username
                </label>
                <input
                    v-model="form.username"
                    class="border border-gray-400 p-2 w-full"
                    type="text"
                    name="username"
                    id="username"
                    required
                >
                <span v-if="errors.username" class="text-sm text-red-700">{{ errors.username }}</span>
            </div>
            <div class="mb-6">
                <label
                    class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    for="email"
                >
                    Email
                </label>
                <input
                    v-model="form.email"
                    class="border border-gray-400 p-2 w-full"
                    type="email"
                    name="email"
                    id="email"
                    required
                >
                <span v-if="errors.email" class="text-sm text-red-700">{{ errors.email }}</span>
            </div>
            <div class="mb-6">
                <label
                    class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    for="password">Password</label>
                <input
                    v-model="form.password"
                    class="border border-gray-400 p-2 w-full"
                    type="password"
                    name="password"
                    id="password"
                    required
                >
                <span v-if="errors.password" class="text-sm text-red-700">{{ errors.password }}</span>
            </div>
            <div class="mb-6">
                <label
                    class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    for="password_confirmation">Password Confirmation</label>
                <input
                    v-model="form.password_confirmation"
                    class="border border-gray-400 p-2 w-full"
                    type="password"
                    name="password_confirmation"
                    id="password_confirmation"
                    required
                >
                <span v-if="errors.password_confirmation" class="text-sm text-red-700">{{ errors.password_confirmation }}</span>
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
                    @click.prevent="submit"
                    class="
                        py-2
                        px-4
                        border-2 border-black
                        float-right
                        text-black
                        hover:bg-yellow-500
                    "
                >
                    Register
                </button>
            </div>
        </form>

    </main>
</template>

<script>
import Layout from "../../Shared/Layout";

export default {
    name: "Create",

    layout: Layout,

    props: {
        errors: {
            type: Object,
            default: () => {},
        }
    },

    data() {
        return {
            form: {
                name: '',
                username: '',
                email: '',
                password: '',
                password_confirmation: '',
            },
        };
    },

    methods: {
        submit() {
            this.$inertia.post('/auth/register', this.form);
        }
    }
}
</script>
