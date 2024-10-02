<script setup>
import { Head } from '@inertiajs/vue3';
import Card from '../components/Card.vue';
import PaginationLinks from '../components/PaginationLinks.vue';
import inputField from '../components/inputField.vue';
import { router, useForm } from '@inertiajs/vue3';

const props =defineProps({
    listings: Object,
    searchTerm: String,
});

const form = useForm({
    search: props.searchTerm,
});

const search = () => {
    router.get(route('home'), {search: form.search});
};
</script>

<template>
    
    <Head title="Ultimas listagens"/>

    <div class="flex items-center justify-between mb-4">
        <div>
            Filters
        </div>
        
        <div class="w-1/4">
            <form @submit.prevent="search">
                <inputField 
                    type="search"
                    label=""
                    icon="magnifying-glass"
                    placeholder="Search..."
                    v-model="form.search"
                />
            </form>
        </div>
    </div>
    <div v-if="Object.keys(listings.data).length">
        <div class="grid grid-cols-3 gap-4">
            <div v-for="listing in listings.data" :key="listing.id">
                <Card :listing="listing"/>
            </div>
        </div>
        <div class="mt-8">
            <PaginationLinks :paginator="listings"/>
        </div>
    </div>

    <div v-else>
        There are no listings
    </div>
</template>