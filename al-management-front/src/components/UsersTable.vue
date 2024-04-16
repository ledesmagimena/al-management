<template>
  <table class="table table-bordered table-hover">
    <thead>
      <tr>
        <th></th>
        <th>Nombre</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody class="table-group-divider" id="content">
      <tr v-if="this.cargando">
        <td colspan="6">
          <h3>Cargando</h3>
        </td>
      </tr>
      <tr v-else v-for="user, i in users" :key="user.id">
        <td v-text="user.id"></td>
        <td v-text="user.name"></td>
        <td v-text="user.email"></td>
        <td>
          <RouterLink :to="{path:'user-store/'+user.id}" v-if="rolAdmin" class="btn btn-warning">
            <i class="fa-solid fa-edit"> Editar</i>
          </RouterLink>
          &nbsp;
          <button class="btn btn-danger" v-if="rolAdmin" v-on:click="this.delete(user.id)">
            <i class="fa-solid fa-trash">Eliminar</i>
          </button>
        </td>
      </tr>
    </tbody>
  </table>
</template>

<script>
import Swal from "sweetalert2";
import axios from 'axios';
import { getHeaders, isAdmin } from '@/helpers/authRoles';

export default {
data(){
return {
  users:null,
  cargando:false,
  rolAdmin: isAdmin()
}
},

mounted(){
  this.getUsers();
},
methods:{
  async getUsers(){
    const headers = getHeaders();
    const res = await axios.get('http://localhost:8000/api/users', headers);
    this.users = res.data;
    this.cargando = false;
  },
  
  delete(id){
    const headers = getHeaders();
    const btnCancel = Swal.mixin({
        customClass:{confirmButton: 'btn btn-success me-3', cancelButton:'btn btn-danger'},
        buttonsStyling: false
        });

        btnCancel.fire({ 
         title: 'Eliminar Usuario',
         text: '¿Desea eliminarlo?',
         icon: 'question',
         showCancelButton: true,
         confirmButtonText: 'Si, eliminar!',
         cancelButtonText: 'Cancelar'}).then((result) => {
         if(result.isConfirmed){
          axios.delete('http://localhost:8000/api/users/' + id, headers).then(data => {
          this.getUsers()
        });
         }
        });
  }
},
}
</script>