<script setup>
import { Link, Head } from '@inertiajs/vue3';
import NavLink from '../components/NavLink.vue';
import { switchTheme } from '../Theme';

</script>

<template>
  <Head title="My app" />
  <meta name="description" content="My application">
    <div>
      <header class="bg-indigo-900 text-white">
        <nav class="p-6 mx-auto max-w-screen-lg flex items-center justify-between">
          <div class="flex items-center space-x-6">
            <NavLink routeName="home" componentName="Home">Home</NavLink>
          </div>
          <div class="flex items-center space-x-6">
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

    <main :route="$page.route" class="p-6">
      <body class="p-6 bg-indigo-100 rounded-lg text-black dark:bg-indigo-900 dark:text-white">
        <slot />
      </body>
    </main>
</template>
