import { createStore } from "vuex";
import { loginService } from "@/services";
import { LoginResponse,State } from "@/types";


export const store = createStore({
  state(): State {
    const token = localStorage.getItem('token');
    return {
      token: token,
      is_authenticated: !!token,
      sesionExp: false,
      user: null,
      permissions: []
    };
  },
  mutations: {
    setToken(state, token: string) {
      state.token = token;
      state.is_authenticated = !!token;
    },
    setUser(state, user: string) {
      state.user = user;
    },
    setPermissions(state, permissions: string[]) {
      state.permissions = permissions;
    },
    logout(state) {
      state.token = null;
      state.is_authenticated = false;
      state.user = null;
      state.permissions = [];
      localStorage.removeItem('token');
    }
  },
  actions: {
    async login(context, { username, password }: { username: string; password: string }) {
      try {
        const response: LoginResponse = await loginService.login(username, password);
        localStorage.setItem('token', response.token);
        context.commit('setToken', response.token);
        context.commit('setUser', response.name);
        context.commit('setPermissions', response.permissions);
        return response; 
      } catch (error) {
        console.error('Error al iniciar sesión:', error);
        throw error;
      }
    },
    logout(context) {
      context.commit('logout');
    }
  },
  getters: {
    isAuthenticated: state => state.is_authenticated,
    user: state => state.user,
    permissions: state => state.permissions
  }
});

export default store;