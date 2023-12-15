<script setup>

import {useForm} from "@inertiajs/inertia-vue3";

const form = useForm({
    name: null,
    email: null,
    password:null,
    password_confirmation: null,
})
const register = () => form.post(route('user-account.store'))

</script>

<template>
    <form @submit.prevent="register">
        <div class="w-1/2 mx-auto">
            <div>
                <label for="username" class="block mb-1 text-gray-500 dark:text-gray-300 font-medium">User Name:</label>
                <input id="username" v-model="form.name" type="text" class="block w-full  p-2 rounded-md shadow-sm border border-gray-300 dark:border-gray-600 text-gray-500" />
                <div v-if="form.errors.name" class="input-error">{{ form.errors.name }}</div>
            </div>
            <div>
                <label for="email" class="block mb-1 text-gray-500 dark:text-gray-300 font-medium">E-mail</label>
                <input id="email" v-model="form.email" type="text" class="block w-full  p-2 rounded-md shadow-sm border border-gray-300 dark:border-gray-600 text-gray-500" />
                <div v-if="form.errors.email" class="input-error">{{ form.errors.email }}</div>
            </div>
            <div class="mt-4">
                <label for="password" class="block mb-1 text-gray-500 dark:text-gray-300 font-medium">Password</label>
                <input id="password" v-model="form.password" type="password" class="block w-full  p-2 rounded-md shadow-sm border border-gray-300 dark:border-gray-600 text-gray-500" />
                <div v-if="form.errors.password" class="input-error">{{ form.errors.password }}</div>
            </div>
            <div class="mt-4">
                <label for="password_confirm" class="block mb-1 text-gray-500 dark:text-gray-300 font-medium">Confirm password</label>
                <input id="password_confirm" v-model="form.password_confirmation" type="password" class="block w-full  p-2 rounded-md shadow-sm border border-gray-300 dark:border-gray-600 text-gray-500" />
                <div v-if="form.errors.password_confirmation" class="input-error">{{ form.errors.password_confirmation }}</div>
            </div>
            <div class="mt-4">
                <button class="bg-indigo-600 w-full rounded hover:bg-indigo-400 p-3 text-white" type="submit">Create Account</button>
            </div>
        </div>
    </form>
</template>

<style scoped>
.input-error{
    color: red;
}

</style>
