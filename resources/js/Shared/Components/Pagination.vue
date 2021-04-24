<template>
    <div v-if="links_data.length > 3">
        <nav class="border-t border-gray-200 px-4 flex items-center justify-between sm:px-0">
            <div class="-mt-px w-0 flex-1 flex">
                <a :href="first.url" class="border-t-2 border-transparent pt-4 pr-1 inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">
                    <ArrowNarrowLeftIcon class="mr-3 h-5 w-5 text-gray-400" aria-hidden="true" />
                    Previous
                </a>
            </div>
            <div class="-mt-px flex">
                <template v-for="(link, key) in links">
                    <inertia-link v-if="link.active" class="border-yellow-500 text-yellow-600 border-t-2 pt-4 px-4 inline-flex items-center text-sm font-medium" :href="link.url" v-html="link.label" />
                    <inertia-link v-else class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 border-t-2 pt-4 px-4 inline-flex items-center text-sm font-medium" :href="link.url" v-html="link.label" />
                </template>
            </div>
            <div class="-mt-px w-0 flex-1 flex justify-end">
                <a :href="last.url" class="border-t-2 border-transparent pt-4 pl-1 inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">
                    Next
                    <ArrowNarrowRightIcon class="ml-3 h-5 w-5 text-gray-400" aria-hidden="true" />
                </a>
            </div>

        </nav>
    </div>
</template>

<script>
import { ArrowNarrowLeftIcon, ArrowNarrowRightIcon } from '@heroicons/vue/solid'

export default {
    components: {
        ArrowNarrowLeftIcon,
        ArrowNarrowRightIcon,
    },
    props: {
        links_data: Array,
    },
    data: function() {
        return {
            first: this.links_data[0],
            last: this.links_data[this.links_data.length - 1],
            links: this.links_data.slice(1, this.links_data.length - 1),

        }
    },
}

</script>
