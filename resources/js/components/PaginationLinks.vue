<script setup>
defineProps({
    paginator: Object
});

const makeLabel = (label) => {
    if (label.includes('Previous')) {
        return '<<';
    } else if (label.includes('Next')) {
        return '>>';
    } else {
        return label;
    }
};
</script>

<template>
    <div class="flex justify-between items-start">
        <div class="flex items-center rounded-md overflow-hidden shadow-lg">
            <div v-for="(link, i) in paginator.links" :key="i">
                <component
                :is="link.url ? 'Link' : 'span'"
                :href="link.url"
                v-html="makeLabel(link.label)"
                class="border-x border-slate-50 w-12 h-12 grid
                place-items-center bg-white dark:bg-indigo-950
                dark:border-indigo-800"
                :class="{'hover:bg-indigo-400 dark:hover:bg-indigo-800' : link.url, 
                'text-slate-300 dark:text-slate-500' : !link.url,
                'font-bold text-indigo-900 dark:text-green-500' : link.active}"
                />
            </div>
        </div>

        <p class="text-slate-300 dark:text-slate-500 text-sm">
            Mostrando {{ paginator.from }} a {{ paginator.to }} de {{ paginator.total }} resultados
        </p>
    </div>
</template>