<script setup>
import {Link, useForm} from "@inertiajs/inertia-vue3";

const form = useForm({
    email: null,
    password:null
})
const login = () => form.post(route('login.store'))

</script>

<template>
        <form @submit.prevent="login">
            <div class="w-1/2 mx-auto">
                <div>
                    <label for="email" class="block mb-1 text-gray-500 dark:text-gray-300 font-medium">E-mail (username)</label>
                    <input id="email" v-model="form.email" type="text" class="block w-full  p-2 rounded-md shadow-sm border border-gray-300 dark:border-gray-600 text-gray-500" />
                    <div v-if="form.errors.email" class="input-error">{{ form.errors.email }}</div>
                </div>
                <div class="mt-4">
                    <label for="password" class="block mb-1 text-gray-500 dark:text-gray-300 font-medium">Password</label>
                    <input id="password" v-model="form.password" type="password" class="block w-full  p-2 rounded-md shadow-sm border border-gray-300 dark:border-gray-600 text-gray-500" />
                    <div v-if="form.errors.password" class="input-error">{{ form.errors.password }}</div>
                </div>


                <div class="mt-2">
                    <p class="text-gray-500">If you don't have account <Link class='p-2 text-blue-600 underline' href="/user-account/create"> Create Account</Link></p>
                </div>


                <div class="mt-4">
                    <button class="bg-indigo-600 w-full rounded hover:bg-indigo-400 p-3 text-white" type="submit">Login</button>
                </div>
            </div>
        </form>
    </template>

<style scoped>
.input-error{
    color: red;
}

</style>
