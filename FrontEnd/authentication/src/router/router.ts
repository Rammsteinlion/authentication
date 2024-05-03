import { createRouter, createWebHistory } from "vue-router";
import store from "@/store/store";
import Login from "@/pages/Login.vue";

const router = createRouter({
  // history: createWebHistory(import.meta.env.BASE_URL),
  history: createWebHistory(),
  routes: [
    {
      name: "",
      path: "/",
      redirect: (_) => {
        if (!store.state.is_authenticated) return { path: "/login" };
        return { path: "/home" };
      },
    },
    {
      path: "/login",
      name: "Login",
      component: Login,
    },

    {
      path: "/home",
      name: "home",
      component: () => import("../pages/Home.vue"),
      meta: { requiresAuth: true },
    },
  ],
});

router.beforeEach((to, from, next) => {
  // Verificar si la ruta requiere autenticación y el usuario no está autenticado
  if (to.meta.requiresAuth && !store.state.is_authenticated) {
    next("/login"); // Redirigir al usuario al login
  } else {
    next(); // Permitir continuar con la navegación
  }
});

export default router;
