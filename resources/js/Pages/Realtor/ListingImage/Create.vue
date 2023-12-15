<template>
    <Box>
        <template #header>Upload New Images</template>
        <form @submit.prevent="upload">

            <section class="flex items-center gap-2">
                <input  class="border rounded-md file:px-4 file:py-2 border-gray-200 hover:bg-indigo-600 hover:text-white cursor-pointer transition-all" type="file" multiple aria-multiline="true"  name="images[]"  @input="addFiles"/>
                <button type="submit" :disabled="!canUpload" class="btn-outline disabled:opacity-25 disabled:cursor-not-allowed">Upload</button>
                <button type="reset" @click="reset" class="btn-outline">Reset</button>
            </section>

            <div v-if="imageErrors.length" class="input-error">
                <div v-for="(error, index) in imageErrors" :key="index">
                    {{ error }}
                </div>
            </div>

        </form>
    </Box>

    <Box v-if="listing.images.length" class="mt-4">
        <template #header>Current Listing Images</template>
        <section class="mt-4 grid grid-cols-3 gap-4">
            <div v-for="image in listing.images" :key="image.id" class="flex flex-col gap-2">
                <img alt="img" :src="image.src"  class="w-full h-100"/>
                    <Link :href="route('realtor.listing.image.destroy', {listing: props.listing.id, image: image.id})" method="delete" as="button" class="rounded-md bg-gray-100 border border-gray-500 text-gray-700 hover:bg-indigo-600 hover:text-white transition" >
                        Delete Image
                    </Link>
            </div>
        </section>
    </Box>

</template>
<script setup>
import Box from "../../../Components/UI/Box.vue";
import {Link, useForm} from "@inertiajs/inertia-vue3";
import {computed} from "vue";
import {Inertia} from "@inertiajs/inertia";
import NProgress from 'nprogress'

const props = defineProps({ listing: Object })
const imageErrors = computed(() => Object.values(form.errors))


Inertia.on('progress', (event) => {
    if (event.detail.progress.percentage) {
        NProgress.set((event.detail.progress.percentage / 100) * 0.9)
    }
})
const addFiles = (event) => {
    for (const image of event.target.files) {
        form.images.push(image)
    }

}

const form = useForm({
    images: [],
})

//
const canUpload = computed(() => form.images.length)



const upload = () => {
    form.post(
        route('realtor.listing.image.store', { listing: props.listing.id }),
        {
            onSuccess: () => form.reset('images'),
        },
    )
}

const reset = () => form.reset('images')
</script>
<style scoped>

</style>
