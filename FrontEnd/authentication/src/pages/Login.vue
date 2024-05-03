<script setup lang="ts">
import { defineComponent } from 'vue'
import { useRouter } from 'vue-router';
import store from '@/store/store'

const router = useRouter()

const goToHome = () => {

    // store.dispatch('login', true)
      if (store.state.is_authenticated) {
        router.push({ name: 'home' }) // Navegar a la página de inicio
      } else {
        alert('No puedes acceder a la página de inicio sin autenticarte') // Mostrar mensaje si el usuario no está autenticado
      }
    }
</script>
<template>
    <p style="color: black;">Login</p>
    <button @click="goToHome">IR AL HOME</button>
</template>
<style scoped></style>
