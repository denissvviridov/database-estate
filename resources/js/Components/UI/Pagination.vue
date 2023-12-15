<script setup>
import {Link} from "@inertiajs/inertia-vue3";

defineProps({links: Array})
</script>

<template>
    <div class="flex gap-2">
        <Link  v-for="(link, index) in links"
               :key="index"
               class="py-2 px-4  rounded-md"
               :href="link.url"
               :class="{'bg-indigo-500 text-white' : link.active}"
               v-html="link.label"
        />


    </div>

</template>

<style scoped>

</style>
