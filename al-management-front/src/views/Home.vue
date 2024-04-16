<script setup>
  import ProductsTable from '@/components/ProductsTable.vue';
  import UsersTable from '@/components/UsersTable.vue';
</script>

<template>
  <main>
    <div>
      <h3>Productos</h3>
      <button v-on:click="createProduct">+</button>
    </div>
    <ProductsTable/>
    <div>
      <h3>Usuarios</h3>
      <button v-on:click="createUser">+</button>
    </div>
    <UsersTable/>
  </main>
</template>
<script>
  export default {
    methods: {
      createProduct() {
        window.location.href = '/product-store';
      },
      createUser() {
        window.location.href = '/user-store';
      }
    }
  }
</script>


