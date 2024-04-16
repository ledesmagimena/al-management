<script setup>
</script>

<template>
  <nav>
    <div class="nav-title">
      <RouterLink :to="{path:'/'}" class="nav">
        <h1>AL-Management</h1>
      </RouterLink>
    </div>
    <div class="nav-logout">
      <button v-on:click="logout">Cerrar Sesión</button>
    </div>
  </nav>
</template>
<script>
  import { getHeaders } from '../helpers/authRoles'
  import axios from 'axios';

  export default {
    methods: {
      logout() {
        const headers = getHeaders();
        console.log('logout', headers)
        axios.post('http://localhost:8000/api/logout',null, headers).then(data => {
          sessionStorage.removeItem('user')
          window.location.href = '/login';
        });
      }
    }
  }
</script>
<style>
  .nav-title a {
    text-decoration: none;
    color: black;
  }
</style>
