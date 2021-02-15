import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/productos',
    name: 'Productos',
    // route level code-splitting
    // this generates a separate chunk (productos.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "productos" */ '../views/Productos.vue')
  },
  {
    path: '/login',
    name: 'Login',
    component: () => import(/* webpackChunkName: "login" */ '../views/Login.vue')
  },
  {
    path:'/agregar',
    name: 'Agregar',
    component: () => import(/* webpackChunkName: "Agregar" */ '../views/Agregar.vue')
  }
]

const router = new VueRouter({
  routes
})

export default router
