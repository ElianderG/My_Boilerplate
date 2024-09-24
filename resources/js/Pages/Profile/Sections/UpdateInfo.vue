<script setup>
import Container from '../../../components/Container.vue';
import InputField from '../../../components/inputField.vue';
import Primarybtn from '../../../components/Primarybtn.vue';
import ErrorMessages from '../../../components/ErrorMessages.vue';
import SessionMessages from '../../../components/SessionMessages.vue';
import Title from '../../../components/Title.vue';
import { router, useForm } from '@inertiajs/vue3';

const props = defineProps({
    user: Object,
    status: String,
});

const form = useForm({
    name: props.user.name,
    email: props.user.email,
});

const resendEmail = (e) => {
    router.post(
        route('verification.send'), {}, 
        {
            onStart: () => (e.target.disabled = true),
            onFinish: () => (e.target.disabled = false),
        }
    );
};
</script>

<template>
    <Container class="'mb-6'">
        <div class="mb-6">
            <Title>Atualize suas informações</Title>
            <p>Atualize as informações do seu perfil e endereço de e-mail.</p>
        </div>

        <ErrorMessages :errors="form.errors"/>

        <form 
        @submit.prevent="form.patch(route('profile.info'))"
        class="space-y-6">
            <InputField label="Nome" name="name" type="text" icon="user" placeholder="Seu nome" class="w-1/2" v-model="form.name"/>
            <InputField label="Email" name="email" type="email" icon="envelope" placeholder="Seu email" class="w-1/2" v-model="form.email"/>
        
            <div v-if="!props.user.email_verified_at">
                <SessionMessages :status="status"/>
                <p class="flex items-center gap-2">
                    Seu endereço de e-mail não está verificado.
                    <button
                    @click="resendEmail"
                    class="text-indigo-500
                    hover:text-indigo-600 font-medium underline dark:text-indigo-400 
                    dark:hover:text-indigo-500 disabled:text-slate-300 disabled:cursor-wait"
                    >Clique aqui para reenviar o link de verificação.</button>
                </p>
            </div>

            <Primarybtn :disabled="form.processing">Save</Primarybtn>
        </form>
    </Container>
</template>