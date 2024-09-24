<script setup>
import Container from '../../../components/Container.vue';
import InputField from '../../../components/inputField.vue';
import Primarybtn from '../../../components/Primarybtn.vue';
import ErrorMessages from '../../../components/ErrorMessages.vue';
import Title from '../../../components/Title.vue';
import { useForm } from '@inertiajs/vue3';

const form = useForm({
current_password: "",
password: "",
password_confirmation: "",
});

const submit = () => {
    form.put(route('profile.password'), {
        onSuccess: () => form.reset(),
        onError: () => form.reset(),
        preserveScroll: true,
    })
};

</script>

<template>
    <Container class="'mb-6'">
        <div class="mb-6">
            <Title>Atualizar sua senha</Title>
            <p>Tenha certeza de usar uma senha longa e segura.</p>
        </div>

        <ErrorMessages :errors="form.errors"/>

        <form @submit.prevent="submit" class="space-y-6">
            <InputField label="Senha Atual" type="password" icon="lock" placeholder="Sua senha atual" class="w-1/2" v-model="form.current_password"/>
            <InputField label="Nova Senha" type="password" icon="lock" placeholder="Sua nova senha" class="w-1/2" v-model="form.password"/>
            <InputField label="Confirme sua Senha" type="password" icon="lock" placeholder="Confirme sua nova senha" class="w-1/2" v-model="form.password_confirmation"/>

            <p class="text-green-500 font-medium">
                {{ form.recentlySuccessful ? "Senha alterada com sucesso" : "" }}
            </p>

            <Primarybtn :disabled="form.processing">Salvar</Primarybtn>
        </form>
    </Container>
</template>