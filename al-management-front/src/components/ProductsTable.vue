<template>
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Producto</th>
              <th>Nombre</th>
              <th>Descripción</th>
              <th>Precio</th>
              <th>Stock</th>
            </tr>
          </thead>
          <tbody class="table-group-divider" id="content">
            <tr v-if="this.cargando">
              <td colspan="6">
                <h3>Cargando</h3>
              </td>
            </tr>
            <tr v-else v-for="prod, i in products" :key="prod.id">
              <td v-text="(i+1)"></td>
              <td v-text="prod.id"></td>
              <td v-text="prod.name"></td>
              <td v-text="prod.description"></td>
              <td v-text="'$'+prod.price"></td>
              <td v-text="prod.stock"></td>
              <td>
                <RouterLink :to="{path:'product-store/'+prod.id}" v-if="rolAdmin" class="btn btn-warning">
                  <i class="fa-solid fa-edit"> Editar</i>
                </RouterLink>
                &nbsp;
                <button class="btn btn-danger" v-if="rolAdmin" v-on:click="this.delete(prod.id)">
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
        products:null,
        cargando:false,
        rolAdmin: isAdmin()
      }
    },

    mounted(){
      this.getProducts();
    },

    methods:{
      async getProducts(){
        const headers = getHeaders()
        const res = await axios.get('http://localhost:8000/api/products', headers);
        this.products = res.data;
        this.cargando = false;
      },
        delete(id){
        const headers = getHeaders()

        const btnCancel = Swal.mixin({
        customClass:{confirmButton: 'btn btn-success me-3', cancelButton:'btn btn-danger'},
        buttonsStyling: false
        });

        btnCancel.fire({ 
         title: 'Eliminar Producto',
         text: '¿Desea eliminarlo?',
         icon: 'question',
         showCancelButton: true,
         confirmButtonText: 'Si, eliminar!',
         cancelButtonText: 'Cancelar'}).then((result) => {
         if(result.isConfirmed){
          axios.delete('http://localhost:8000/api/products/' + id, headers).then(data => {
          this.getProducts()
        });
         }
        });
      }
    },
  }
  </script>