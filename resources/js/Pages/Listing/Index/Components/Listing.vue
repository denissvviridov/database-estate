<template>
    <Box>
        <div>
            <Link
                :href="route('listing.show', {listing: listing.id})"
            >
                <div class="flex items-center gap-1">
                    <Price :price="listing.price" class="text-2xl font-bold"/>
                </div>
                <ListingSpace :listing="listing" class="text-lg"/>
                <ListingAddress :listing="listing"/>
            </Link>
        </div>

<!--        <div>-->
<!--            <Link-->
<!--                :href="route('listing.destroy', {listing: listing.id})"-->
<!--                method="DELETE" as="button"-->
<!--            >-->
<!--                Delete-->
<!--            </Link>-->
<!--        </div>-->
    </Box>

</template>
<script setup>

import Box from "../../../../Components/UI/Box.vue";
import Price from "../../../../Components/Price.vue";
import {Link} from "@inertiajs/inertia-vue3";
import ListingSpace from "../../../../Components/ListingSpace.vue";
import ListingAddress from "../../../../Components/ListingAddres.vue";
import {useMonthlyPayment} from "../../../../Composable/useMonthlyPayment.js";

const props = defineProps({listing: Object})
const {monthlyPayment, totalInterest} = useMonthlyPayment(props.listing.price, 2.5, 25)
</script>

<style scoped>

</style>
