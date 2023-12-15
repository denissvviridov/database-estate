<template>
    <header class="border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 w-full">
        <div class="container mx-auto w-full">
            <nav class="p-4 flex items-center justify-between">
                <div class="text-lg font-medium">
                    <Link :href="route('listing.index')">Listings</Link>
                </div>
                <div class="text-xl text-indigo-600 dark:text-indigo-300 font-bold text-center">
                    <Link :href="route('listing.index')">Estate DataBase</Link>
                </div>
                <div class="flex items-center gap-4" v-if="user">
                    <Link :href="route('realtor.listing.index')" class="text-sm text-gray-500">{{ user.name }}</Link>
                    <Link :href="route('realtor.listing.create')"
                          class="bg-indigo-600 hover:bg-indigo-500 text-white font-medium p-2 rounded-md">+ New Listing
                    </Link>
                    <div>
                        <Link :href="route('logout')" method="delete" as="button">Logout</Link>
                    </div>
                </div>
                <div v-else class="flex gap-2 items-center">
                    <Link :href="route('user-account.create')">Register</Link>
                    <Link :href="route('login')">Sign-in</Link>
                </div>

            </nav>
        </div>
    </header>

    <main class="container mx-auto p-4">
        <div v-if="flashSuccess"
             class="mb-4 border rounded-md shadow-sm border-green-200 dark:border-green-800 bg-green-50 dark:bg-green-900 p-2">
            {{ flashSuccess }}
        </div>
        <slot>Default</slot>
    </main>
</template>

<script setup>
import {computed} from 'vue'
import {Link, usePage} from '@inertiajs/inertia-vue3'

const page = usePage()
const flashSuccess = computed(
    () => page.props.value.flash.success,
)

const user = computed(
    () => page.props.value.user
)
</script>

<style scoped>
.success {
    background-color: green;
    color: white;
}
</style>
