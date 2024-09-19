<script setup>
import { Head, useForm } from '@inertiajs/vue3';
import Container from '../../components/Container.vue';
import Title from '../../components/Title.vue';
import ErrorMessages from '../../components/ErrorMessages.vue';
import InputField from '../../components/inputField.vue';
import Primarybtn from '../../components/Primarybtn.vue';

const props = defineProps({
    token: String,
    email: String,
})

const form = useForm({
    token: props.token,
    email: '',
    password: '',
    password_confirmation: '',
})

const submit = () => {
    form.post(route('password.update'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    })
}
</script>

<template>
    <Head title="Resetar Senha"/>
    <Container class="w-1/2">
        <div class="mb-8 text-center">
            <Title>Entre com sua nova senha</Title>
        </div>

        <ErrorMessages :errors="form.errors"/>       
        
        <form @submit.prevent="submit" class="space-y-6">
            <InputField label="Email" name="email" type="email" icon="envelope" placeholder="Seu email" v-model="form.email"/>
            <InputField label="Senha" name="password" type="password" icon="lock" placeholder="Sua senha" v-model="form.password"/>
            <InputField label="Confirme sua senha" name="password_confirmation" placeholder="Confirme sua senha" icon="lock" type="password" v-model="form.password_confirmation"/>

        <Primarybtn :disabled="form.processing" class="w-full mb-4 mt-6">Resetar Senha</Primarybtn>
        </form>
    </Container>
</template>