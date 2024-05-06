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

router.beforeEach(async (to, from, next) => {
  // Si la ruta requiere autenticación
  if (to.meta.requiresAuth) {
    // Si el usuario está autenticado, continuar con la navegación
    if (store.state.is_authenticated) {
      next();
    } else {
      // Si el usuario no está autenticado, redirigir al inicio de sesión
      next("/login");
    }
  } else {
    // Si la ruta no requiere autenticación, permitir la navegación
    next();
  }
});

export default router;
