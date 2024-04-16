<template>
  <div>
    <form @submit.prevent="onSubmit">
      <label for="inputName" class="form-label">Nombre</label>
      <input type="text" v-model="user.name" id="inputName" class="form-control form-control-sm">
      <label for="inputDescription" class="form-label">Email</label>
      <input type="text" v-model="user.email" id="inputDescription" class="form-control form-control-sm">
    
      <button class="btn btn-danger"  v-on:click="store">
        <i class="fa-solid fa-trash">Guardar</i>
      </button>
    </form>
  </div>
</template>

<script>
import { showAlert} from '../functions'
import axios from 'axios';
import { getHeaders } from '../helpers/authRoles'

export default {
  data() {
    return {
      user: {
        name: "",
        email: ""
      }
    };
  },
  mounted(){
    this.$route.params.id && this.getUserById();
  },
  methods: {
    store() {
      const headers = getHeaders();
      if(!this.$route.params.id) {
        axios.post('http://localhost:8000/api/users', this.user, headers).then(data => {
        showAlert('Usuario creado!', 'success');
        }).catch(function (error) {
          showAlert('Error al crear usario.', 'error');
        });
      } else {
         axios.put('http://localhost:8000/api/users/' + this.user.id, this.user, headers).then(data => {
         showAlert('Usuario editado!', 'success');
         }).catch(function (error) {
         showAlert('Error al editar usuario.', 'error');
         });
      }
    },
    async getUserById(){
      const headers = getHeaders();
      const res = await axios.get('http://localhost:8000/api/users/' + this.$route.params.id, headers);
      this.user = res.data?.data;
      }
  }
}
</script>