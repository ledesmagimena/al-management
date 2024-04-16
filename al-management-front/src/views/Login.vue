

<template>
  <div class="card">
    <div class="card-header bg-dark text-white text-center">AL</div>
    <div class="card-body">
      <div class="mb-3">
        <form @submit.prevent="onSubmit">
          <div class="input-group mb-3">
            <input type="email" v-model="email" id="email" placeholder="Ingrese su email" class="form-control" required>
          </div>
          <div class="input-group mb-3">
            <input type="text" v-model="password" id="password" placeholder="Ingrese su contraseña" class="form-control" required>
          </div>
          <div class="text-center">
            <button class="btn btn-success" v-on:click="this.login">LOGIN</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  

<!-- <form @submit.prevent="handleSubmit">
  <input type="email" v-model="email" placeholder="email">
  <input type="password" v-model="password" placeholder="contraseña">
  <button type="submit" v-on:click="console.log('te amo')">Login</button>
</form>
<p>{{email}}</p> -->
</template>

<script>
import { showAlert } from '../functions'
import axios from 'axios';

export default {
  data() {
    return {
      name: '',
      email: '',
      password: '',
      url:'http://localhost:8000/api/login',
      cargando: false
    }
  },

  methods:{
    login(){
         let params = {
        name: this.name,
        email: this.email,
        password: this.password
      };

      axios.post('http://localhost:8000/api/login', params).then(data => {
      const {data:userData} = data;
      sessionStorage.setItem('user', JSON.stringify(userData));
      window.location.href='/';
      }).catch(function (error) {
        showAlert('Usuario o contraseña incorrectos', 'error');
     });
    }
  }
}
</script>