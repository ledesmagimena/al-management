import { createRouter, createWebHistory } from 'vue-router';
import Login from '@/views/Login.vue';
import Home from '@/views/Home.vue';
import ProductStore from '@/views/products/ProductStore.vue';
import UserStore from '@/views/users/UserStore.vue';
import { isAdmin } from '@/helpers/authRoles';

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home
    },
    {
      path: '/login',
      name: 'login',
      component: Login,
      meta: {
        hideNavbar: true,
      }
    },
    {
      path: '/product-store/:id?',
      name: 'productStore',
      component: ProductStore
    },
    {
      path: '/user-store/:id?',
      name: 'userStore',
      component: UserStore
    }
  ]
});

router.beforeEach((to, from, next) => {
  const userLoged = sessionStorage.getItem('user');

  if (to.name !== 'login' && !userLoged) {
    next({ name: 'login' });
  } else {
    if((to.name == 'productStore' || to.name == 'userStore') && !isAdmin()) {
      next({ name: 'home' });
      return;
    }
    next();
    return;
  }


});

export default router;
