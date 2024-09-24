<script setup>
import { useForm } from '@inertiajs/vue3';
import Container from '../../components/Container.vue';
import Primarybtn from '../../components/Primarybtn.vue';
import SessionMessages from '../../components/SessionMessages.vue';
import { Head } from '@inertiajs/vue3';

const form = useForm({});

defineProps({
    status: String,
})

const submit = () => {
    form.post(route('verification.send'))
}

</script>

<template>
    <Head title="Verifique seu e-mail" />

    <Container class="w-1/2">
        <div class="mb-8">
            <p>
                Obrigado por se registrar.
                
                Verifique seu e-mail para confirmar seu cadastro.
            </p>
        </div>

        <form @submit.prevent="submit">
            <SessionMessages :status="status"/>
            <Primarybtn :disabled="form.processing"
            >Reenviar link de verificação para seu e-mail</Primarybtn>
        </form>
    </Container>
</template>