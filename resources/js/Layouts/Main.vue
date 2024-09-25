<script setup>
import { Head } from '@inertiajs/vue3';
import NavLink from '../components/NavLink.vue';
import { switchTheme } from '../Theme';
import { usePage } from '@inertiajs/vue3';
import { computed, ref } from 'vue';

const page = usePage();
const user = computed(() => page.props.auth.user);

const show = ref(false);

</script>

<template>
  <Head title="My app" />
  <!-- overlay -->
  <div v-show="show" @click="show = false" class="fixed inset-0 z-40 bg-black/50"></div>
  <meta name="description" content="My application">
    <div>
      <header class="bg-gradient-to-r from-indigo-900 to-indigo-950 text-white
      dark:bg-gradient-to-r dark:from-blue-950 dark:to-black">
        <nav class="p-6 mx-auto max-w-screen-lg flex items-center justify-between">
          <!-- Right side of nav -->
          <div class="flex items-center space-x-6">
            <NavLink routeName="home" componentName="Home">Home</NavLink>
          </div>

          <!-- Left side of nav -->
          <div class="flex items-center space-x-6"> 
            <!-- Auth -->
            <div v-if="user">          
              <div @click="show = !show"
              class="flex items-center gap-2 px-3 py-1
              rounded-lg hover:bg-indigo-500 cursor-pointer">
                <p>{{ user.name }}</p>  
                <i class="fa-solid fa-caret-down"></i>
              </div>

              <!-- User dropdown menu -->
              <div v-show="show"
              @click="show = false"
              class="absolute z-50 top-16 right-100 bg-indigo-800 dark:bg-indigo-950
              text-white rounded-lg border-slate-100 border overflow-hidden w-40"
              > 
                <Link
                  :href="route('profile.edit')"
                  class="block w-full px-6 py-3 
                  hover:bg-indigo-700 text-left"
                  >Perfil</Link>
                <Link 
                  :href="route('dashboard')"
                  class="block w-full px-6 py-3 
                  hover:bg-indigo-700 text-left"
                  >Dashboard</Link> 
                <Link 
                  :href="route('logout')"
                  method="post"
                  as="button"
                  class="block w-full px-6 py-3 
                  hover:bg-indigo-700 text-left"
                  >Logout</Link>
              </div>
            </div>

            <!-- Guest -->
            <div v-else>
              <NavLink routeName="login" componentName="Auth/Login">Login</NavLink>
              <NavLink routeName="register" componentName="Auth/Register">Cadastrar</NavLink>
            </div>

            <NavLink routeName="about" componentName="About">Sobre</NavLink>

            
            <button 
              @click="switchTheme"
              class="hover:bg-indigo-500 w-6 h-6 grid
              place-items-center rounded-full hover:outline outline-1
              outline-white right-0">
              <i class="fa-solid fa-circle-half-stroke"></i>
            </button>
          </div>
        </nav>
      </header>
    </div>

    <main :route="$page.route" class="">
      <div class="p-6 space-y-8
      bg-gradient-to-r from-indigo-500 via-blue-100 to-indigo-500 rounded-lg text-black 
      dark:bg-indigo-900 dark:text-white dark:bg-gradient-to-r dark:from-black dark:via-indigo-800 dark:to-black">
        <slot />
      </div>
    </main>
</template>
