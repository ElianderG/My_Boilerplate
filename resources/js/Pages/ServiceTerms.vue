<script setup>
import Title from '../components/Title.vue';
import NavLink from '../components/NavLink.vue';
</script>

<template>    
    <div class="max-w-3xl mx-auto p-6 bg-gray-100 rounded-lg text-gray-800 dark:bg-indigo-950 dark:text-white">
        <Title class="mb-4 flex align-center justify-center">Termos de Serviço</Title>
        
        <p class="mb-4">Bem-vindo ao <strong>[Nome do Seu Site]</strong>. Ao acessar e utilizar este site, você concorda com os seguintes termos de serviço. Por favor, leia atentamente.</p>
        
        <h2 class="text-2xl font-semibold mt-6 mb-2">1. Uso do Site</h2>
        <p class="mb-4">O conteúdo deste site é oferecido para uso pessoal e informativo. Você concorda em não utilizar este site de maneira que possa prejudicar ou sobrecarregar a sua infraestrutura ou comprometer a segurança.</p>
        
        <h2 class="text-2xl font-semibold mt-6 mb-2">2. Propriedade Intelectual</h2>
        <p class="mb-4">Todo o conteúdo disponível neste site, incluindo textos, imagens e gráficos, é de propriedade exclusiva de <strong>[Nome do Seu Site]</strong> ou de seus licenciadores e está protegido por leis de direitos autorais. Qualquer uso não autorizado desse conteúdo é proibido.</p>
        
        <h2 class="text-2xl font-semibold mt-6 mb-2">3. Limitação de Responsabilidade</h2>
        <p class="mb-4">O conteúdo fornecido neste site é oferecido "como está", sem garantias de qualquer tipo. <strong>[Nome do Seu Site]</strong> não se responsabiliza por quaisquer danos diretos, indiretos ou consequenciais resultantes do uso do site.</p>
        
        <h2 class="text-2xl font-semibold mt-6 mb-2">4. Links Externos</h2>
        <p class="mb-4">Nosso site pode conter links para sites de terceiros. Não nos responsabilizamos pelo conteúdo ou práticas desses sites.</p>
        
        <h2 class="text-2xl font-semibold mt-6 mb-2">5. Modificações</h2>
        <p class="mb-4"><strong>[Nome do Seu Site]</strong> reserva-se o direito de modificar estes termos a qualquer momento. Recomendamos que você revise esta página periodicamente para se manter informado sobre quaisquer alterações.</p>
        
        <h2 class="text-2xl font-semibold mt-6 mb-2">6. Contato</h2>
        <p>Em caso de dúvidas sobre estes Termos de Serviço, entre em contato conosco através de [Email ou Formulário de Contato].</p>
        <p class="mb-4 mt-6"></p>
        <NavLink routeName="register" label="Voltar para o site" class="bg-slate-950 text-white flex align-middle justify-center">Voltar</NavLink>
    </div>
</template>