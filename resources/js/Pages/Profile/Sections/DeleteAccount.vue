<script setup>
import Container from '../../../components/Container.vue';
import InputField from '../../../components/inputField.vue';
import Primarybtn from '../../../components/Primarybtn.vue';
import ErrorMessages from '../../../components/ErrorMessages.vue';
import Title from '../../../components/Title.vue';
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const showConfirmationPassword = ref(false);

const form = useForm({
    password: '',
});

const submit = () => {
    form.delete(route('profile.destroy'),{
        onFinish: () => form.reset(),
        preserveScroll: true,
    })
}

</script>

<template>
    <Container class="'mb-6'">
        <div class="mb-6">
            <Title>Deletar Conta</Title>
            <p>Assim que sua conta for deletada, todos os seus dados serão pemanentemente excluídos. 
                Essa operação não pode ser desfeita.</p>
        </div>

        <ErrorMessages :errors="form.errors"/>

        <div v-if="showConfirmationPassword">
            <form @submit.prevent="submit" class="flex gap-8">
                <InputField Label="Password" type="password" icon="lock" placeholder="Sua senha" class="w-1/2" v-model="form.password"/>
                <Primarybtn class="bg-red-500 hover:bg-red-700" :disabled="form.processing">Confirmar</Primarybtn>
            
                <button 
                @click="showConfirmationPassword = false"
                class="bg-slate-950 px-6 py-2 rounded-lg text-white hover:bg-blue-800">Cancelar</button>
            </form>
        </div>

        <button 
        v-if="!showConfirmationPassword"
        @click="showConfirmationPassword = true"
        class="px-6 py-2 rounded-lg bg-red-500 text-white hover:bg-red-700">
            <i class="fa-solid fa-triangle-exclamation mr-2"></i>
            Deletar Conta
        </button>
    </Container>
</template>