<script setup>
import { Head } from '@inertiajs/vue3';
defineProps({
    user : String,
})
</script>

<template>
    <Head title="Sobre"/>
    <div>
        <h1>Essa aplicação, criada por {{ user }} é apenas uma demo.</h1>
    </div>
</template>
