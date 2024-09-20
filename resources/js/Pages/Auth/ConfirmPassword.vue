<script setup>
import { Head, useForm } from '@inertiajs/vue3';
import Container from '../../components/Container.vue';
import ErrorMessages from '../../components/ErrorMessages.vue';
import InputField from '../../components/inputField.vue';
import Primarybtn from '../../components/Primarybtn.vue';

const form = useForm({
    password: '',
})

const submit = () => {
    form.post(route('password.confirm'), {
        onFinish: () => form.reset(),
    })
}
</script>

<template>
    <Head title="Confirmar Senha"/>
    <Container class="w-1/2">
        <div class="mb-8 text-center">
            <p>
                Esta é uma área de acesso restrito. Por favor, confirme sua senha antes de continuar.
            </p>
        </div>

        <ErrorMessages :errors="form.errors"/>  
        
        <form @submit.prevent="submit" class="space-y-6">
            <InputField label="Senha" name="password" type="password" icon="lock" placeholder="Sua senha" v-model="form.password"/>

        <Primarybtn :disabled="form.processing" class="w-full mb-4 mt-6">Confirmar</Primarybtn>
        </form>
    </Container>
</template>