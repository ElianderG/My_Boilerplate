<script setup>
import { Head, useForm } from '@inertiajs/vue3';
import Container from '../../components/Container.vue';
import Title from '../../components/Title.vue';
import ErrorMessages from '../../components/ErrorMessages.vue';
import InputField from '../../components/inputField.vue';
import Primarybtn from '../../components/Primarybtn.vue';
import TextLink from '../../components/TextLink.vue';
import CheckBox from '../../components/CheckBox.vue';
const form = useForm({
    email: '',
    password: '',
    remember: null,
})

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    })
}
</script>

<template>
    <Head title="Cadastro"/>
    <Container class="w-1/2">
        <div class="mb-8 text-center">
            <Title>Faça login em sua conta</Title>
            <p>
                Precisa de uma conta? 
                <TextLink routeName="register" label="Registre-se"/>
            </p>
        </div>

        <ErrorMessages :errors="form.errors"/>       
        
        <form @submit.prevent="submit" class="space-y-6">
            <InputField label="Email" name="email" type="email" icon="envelope" placeholder="Seu email" v-model="form.email"/>
            <InputField label="Senha" name="password" type="password" icon="lock" placeholder="Sua senha" v-model="form.password"/>
            <div class="flex items-center justify-between">
                <CheckBox name="remember" v-model="form.remember"> Lembrar de mim </CheckBox>

                <TextLink routeName="home" label="Esqueceu sua senha?" />
            </div>
        <Primarybtn :disabled="form.processing" class="w-full mb-4 mt-6">Login</Primarybtn>
        </form>
    </Container>
</template>