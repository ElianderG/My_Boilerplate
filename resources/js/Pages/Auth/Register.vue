<script setup>
import { Head, useForm } from '@inertiajs/vue3';
import Container from '../../components/Container.vue';
import Title from '../../components/Title.vue';
import ErrorMessages from '../../components/ErrorMessages.vue';
import InputField from '../../components/inputField.vue';
import Primarybtn from '../../components/Primarybtn.vue';
import TextLink from '../../components/TextLink.vue';
const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
})

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    })
}
</script>

<template>
    <Head title="Cadastro"/>
    <Container class="w-1/2">
        <div class="mb-8 text-center">
            <Title>Cadastre uma nova conta</Title>
            <p>
                Já possui uma conta? 
                <TextLink routeName="login" label="Fazer Login"/>
            </p>
        </div>

        <ErrorMessages :errors="form.errors"/>       
        
        <form @submit.prevent="submit" class="space-y-6">
            <InputField label="Nome" name="name" type="text" icon="user" placeholder="Seu nome" v-model="form.name"/>
            <InputField label="Email" name="email" type="email" icon="envelope" placeholder="Seu email" v-model="form.email"/>
            <InputField label="Senha" name="password" type="password" icon="lock" placeholder="Sua senha" v-model="form.password"/>
            <InputField label="Confirme sua senha" name="password_confirmation" placeholder="Confirme sua senha" icon="lock" type="password" v-model="form.password_confirmation"/>
            <p class="text-slate-500 text-sm mb-4 mt-6 dark:text-slate-400">
            Ao clicar em registrar, concorda com os <TextLink routeName="serviceTerms" label="Termos de Serviço"/>
            </p>
        <Primarybtn :disabled="form.processing" class="w-full mb-4 mt-6">Cadastrar</Primarybtn>
        </form>
    </Container>
</template>