<script setup>
import Container from '../../components/Container.vue';
import Title from '../../components/Title.vue';
import InputField from '../../components/inputField.vue';
import Primarybtn from '../../components/Primarybtn.vue';
import ErrorMessages from '../../components/ErrorMessages.vue';
import { Head, useForm } from '@inertiajs/vue3';
import TextArea from '../../components/TextArea.vue';
import ImageUpload from '../../components/ImageUpload.vue';

const form = useForm({
    title: null,
    desc: null,
    tags: null,
    email: null,
    link: null,
    image: null,
})
</script>

<template>
    <Head title="Criar listagem"/>

    <Container>
        <div class="mb-6">
            <Title>Criar nova listagem</Title>
        </div>

        <ErrorMessages :errors="form.errors"/>

        <form class="grid grid-cols-2 gap-6">
            <div class="space-y-6">
                <InputField label="Título" icon="heading" placeholder="Título da listagem" v-model="form.title"/>
                <InputField label="Tags" icon="tags" placeholder="Tags separadas por vírgula" v-model="form.tags"/>
            
                <TextArea
                label="Descrição"
                icon="newspaper"
                placeholder="Descrição da listagem" 
                v-model="form.desc" />
            </div>

            <div class="space-y-6">
                <InputField label="Email" icon="at" placeholder="example@email.com" v-model="form.email"/>
                <InputField label="Link Externo" icon="link" placeholder="https://example.com" v-model="form.link"/>
                <ImageUpload @image="(e) => form.image = e"/>
            </div>

            <div>
                <Primarybtn>create</Primarybtn>
            </div>
        </form>
    </Container>
</template>