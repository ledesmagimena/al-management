<script setup>
import { RouterLink, RouterView } from 'vue-router'
import Nav from './components/Nav.vue'
</script>

<template>
    <Nav v-if="!$route.meta.hideNavbar"/>

  <RouterView />
</template>

<style scoped>
  nav {
    width: 100vw;
  }
</style>

