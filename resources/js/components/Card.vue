<script setup>
import { router, Link } from '@inertiajs/vue3';

const params = route().params;

defineProps({
    listing: Object
});

const selectUser = (id) => {
    router.get(route('home'), {
        user_id: id,
        search: params.search,
        tag: params.tag
    });
};

const selectTag = (tag) => {
    router.get(route('home'), {
        user_id: params.user_id,
        search: params.search,
        tag: tag
    });
};

</script>

<template>
    <div class="bg-white rounded-lg shadow-lg overflow-hidden
    dark:bg-indigo-950 h-full flex flex-col justify-between">
        <div>
            <!-- image -->
            <Link href="">
                <img 
                :src="listing.image ? `/storage/${listing.image}`
                : '/storage/images/listing/default.jpg'"
                alt="" 
                class="w-full h-48 object-cover object-center bg-slate-300">
            </Link>

            <!-- Title $ User -->
             <div class="p-4">
                <h3 class="font-bold text-xl mb-2">
                    {{ listing.title.substring(0, 30) }}...
                </h3>

                <p>Listado em {{ new Date(listing.created_at).toLocaleDateString() }} 
                    por <button class="text-link" @click="selectUser(listing.user.id)">{{ listing.user.name }}</button></p>
             </div>
        </div>
        <!-- Tags -->
        <div v-if="listing.tags" class="flex items-center gap-3 px-4 pb-4">
            <div v-for="tag in listing.tags.split(',')" :key="tag">
                <button 
                @click="selectTag(tag)"
                class="bg-indigo-500  text-white px-2 py-px rounded-full hover:bg-indigo-700 dark:hover:bg-indigo-900">
                    {{ tag }}
                </button>
            </div>
        </div>
    </div>
</template>