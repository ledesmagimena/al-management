<template>
  <div>
    <form @submit.prevent="onSubmit">
      <label for="inputName" class="form-label">Nombre</label>
      <input type="text" v-model="prod.name" id="inputName" class="form-control form-control-sm">
      <label for="inputDescription" class="form-label">Descripción</label>
      <input type="text" v-model="prod.description" id="inputDescription" class="form-control form-control-sm">
      <label for="inputPrice" class="form-label">Precio</label>
      <input type="text" v-model="prod.price" id="inputPrice" class="form-control form-control-sm">
      <label for="inputStock" class="form-label">Stock</label>
      <input type="text" v-model="prod.stock" id="inputStock" class="form-control form-control-sm">
    
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
      prod: {
        name: "",
        description: "",
        price: "",
        stock: ""
      }
    };
  },
  mounted(){
    if(this.$route.params.id) {
      this.getProductById()
      document.querySelector('#inputName').disabled = true;
      document.querySelector('#inputDescription').disabled = true;
    }
  },
  methods: {
    store() {
      const headers = getHeaders();
      if(!this.$route.params.id) {
        axios.post('http://localhost:8000/api/products', this.prod, headers).then(data => {
        showAlert('Producto creado!', 'success');
        }).catch(function (error) {
        showAlert('Error al crear producto.', 'error');
        });
      } else {
        const updateData = {
          price: this.prod.price,
          stock: this.prod.stock
        }

        axios.put('http://localhost:8000/api/products/' + this.prod.id, updateData, headers).then(data => {
        showAlert('Producto editado!', 'success');
        }).catch(function (error) {
        showAlert('Error al editar producto.', 'error');
        });
      }
    },
    async getProductById(){
      const headers = getHeaders();
      const res = await axios.get('http://localhost:8000/api/products/' + this.$route.params.id, headers);
      this.prod = res.data?.data;
    }
  }
}
</script>