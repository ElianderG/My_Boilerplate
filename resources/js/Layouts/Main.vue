<script setup>
import { Head } from '@inertiajs/vue3';
import NavLink from '../components/NavLink.vue';
import { switchTheme } from '../Theme';

</script>

<template>
  <Head title="My app" />
  <meta name="description" content="My application">
    <div>
      <header class="bg-gradient-to-r from-indigo-900 to-indigo-950 text-white
      dark:bg-gradient-to-r dark:from-blue-950 dark:to-black">
        <nav class="p-6 mx-auto max-w-screen-lg flex items-center justify-between">
          <div class="flex items-center space-x-6">
            <NavLink routeName="home" componentName="Home">Home</NavLink>
          </div>
          <div class="flex items-center space-x-6">
            <NavLink routeName="login" componentName="Auth/Login">Login</NavLink>
            <NavLink routeName="register" componentName="Auth/Register">Cadastrar</NavLink>
            <NavLink routeName="about" componentName="About">Sobre</NavLink>
            
            <button 
              @click="switchTheme"
              class="hover:bg-slate-700 w-6 h-6 grid
              place-items-center rounded-full hover:outline outline-1
              outline-white right-0">
              <i class="fa-solid fa-circle-half-stroke"></i>
            </button>
          </div>
        </nav>
      </header>
    </div>

    <main :route="$page.route" class="">
      <body class=" p-6 bg-gradient-to-r from-indigo-500 via-blue-100 to-indigo-500 rounded-lg text-black dark:bg-indigo-900 dark:text-white dark:bg-gradient-to-r dark:from-black dark:via-indigo-800 dark:to-black">
        <slot />
      </body>
    </main>
</template>
