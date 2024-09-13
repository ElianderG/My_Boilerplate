<script setup>
defineProps({
    routeName: String, 
    componentName: String,
})
</script>

<template>
    <Link :href="route(routeName)" 
    class="px-3 py-2 rounded-lg hover:bg-indigo-500"
    :class ="{'bg-indigo-800' : $page.component === componentName }">
        <slot />
    </Link>
</template>
