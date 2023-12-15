<template>
    <div class="w-full flex flex-col justify-center items-center border border-2  border-gray-300 rounded-md">

        <div class="text-center flex flex-col justify-center items-center gap-4 p-10">
            <h1 class="text-8xl text-gray-500">Welcome to</h1>
            <h4 class="text-4xl  text-indigo-600"> <i> estate database</i></h4>


            <div class="mt-20">
                 <Link href="/listing" class="p-5 text-5xl rounded-md bg-indigo-600 text-white hover:bg-indigo-300 hover:text-black transition">Go to Listing</Link>
            </div>
        </div>



    </div>
</template>
<script setup>

import {Link} from "@inertiajs/inertia-vue3";
import Listing from "../Listing/Index/Components/Listing.vue";


defineProps({
    listings: Array
})


</script>
