<script setup>
import { Head, useForm } from '@inertiajs/vue3';
import Container from '../../components/Container.vue';

import ErrorMessages from '../../components/ErrorMessages.vue';
import InputField from '../../components/inputField.vue';
import Primarybtn from '../../components/Primarybtn.vue';

import SessionMessages from '../../components/SessionMessages.vue';

const form = useForm({
    email: '',
})

defineProps({status: String})


const submit = () => {
    form.post(route('password.email'));
}
</script>

<template>
    <Head title="Resetar Password"/>
    <Container class="w-1/2">
        <div class="mb-8 text-center">
            <p>
                Esqueceu sua senha? Sem problema. Basta nos informar seu email e enviaremos um link para redefinir sua senha.
            </p>
        </div>

        <ErrorMessages :errors="form.errors"/>     
        <SessionMessages :status="status"/>  
        
        <form @submit.prevent="submit" class="space-y-6">
            <InputField label="Email" name="email" type="email" icon="envelope" placeholder="Seu email" v-model="form.email"/>

        <Primarybtn :disabled="form.processing" class="w-full mb-4 mt-6">Enviar link para redefinir sua senha</Primarybtn>
        </form>
    </Container>
</template>