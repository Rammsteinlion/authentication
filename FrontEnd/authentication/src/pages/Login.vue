<script setup lang="ts">
import { useRouter } from "vue-router";
import { loginService } from "@/services";
import { ref } from 'vue';
import ShowAlert from '../components/ShowAlert.vue';

const router = useRouter();

const username = ref<string>("");
const password = ref<string>("");

const isOpen = ref<boolean>(false);

const login = async () => {
  const response = await loginService.login(username.value, password.value);
  console.log(response);
};

const showbutton = ():void =>{

}

</script>
<template>
  <div class="relative h-[100vh] grid items-center">
    <img
      src="../assets/img/login-bg.png"
      alt="image"
      class="absolute w-[100%] h-[100%] object-fit object-center"
    />

    <form
      @submit.prevent="login"
      action=""
      class="relative w-[420px] bg-opacity-10 border border-white border-opacity-70 p-10 text-white rounded-xl backdrop-blur-2xl m-auto"
    >
      <h1 class="text-center text-[2rem] mb-[1.25rem]">Login</h1>

      <div class="login__inputs">
        <div class="login__box">
          <input
            type="text"
            v-model="username"
            placeholder="usuario@ejemplo.com"
            class="login__input"
          />

          <i class="ri-mail-fill"></i>
        </div>
        <div class="login__box">
          <input type="password" v-model="password" placeholder="********" class="login__input" />

          <i class="ri-lock-2-fill"></i>
        </div>
      </div>

      <div class="login__check">
        <div class="login__check-box">
          <input type="checkbox" class="login__check-input" id="user-check" />
          <label for="user-check" class="login__check-label">Remember me</label>
        </div>
        <a href="#" class="login__forgot">Forgot Password?</a>
      </div>

      <button type="submit" class="login__button">Login</button>

      <div class="login__register">
        Don´t have an account? <a href="#">Register</a>
      </div>
    </form>
  </div>


  <show-alert/>


  <button @click="showbutton">
    ALERTS
  </button>

</template>
<style scoped>
.login__inputs,
.login__box {
  display: grid;
}

.login__inputs {
  row-gap: 1.25rem;
  margin-bottom: 1rem;
}

.login__box {
  grid-template-columns: 1fr max-content;
  column-gap: 0.75rem;
  align-items: center;
  border: 2px solid hsla(0, 0%, 100%, 0.7);
  padding-inline: 1.25rem;
  border-radius: 4rem;
}

.login__input,
.login__button {
  border: none;
  outline: none;
}

.login__input {
  width: 100%;
  background: none;
  color: var(--white-color);
  padding-block: 1rem;
}

.login__input::placeholder {
  color: var(--white-color);
}

.login__box i {
  font-size: 1.25rem;
}

.login__check,
.login__check-box {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.login__check-box {
  column-gap: 0.5rem;
}

.login__check-input {
  width: 1rem;
  height: 1rem;
  accent-color: var(--white-color);
}

.login__forgot {
  color: var(--white-color);
}

.login__forgot:hover {
  text-decoration: underline;
}

.login__button {
  width: 100%;
  padding: 1rem;
  margin-bottom: 1rem;
  background-color: var(--white-color);
  border-radius: 4rem;
  color: var(--black-color);
  font-weight: 500;
  cursor: pointer;
  position: relative;
  top: 0.65rem;
}

.login__register {
  font-size: var(--small-font-size);
  text-align: center;
}

.login__register a {
  color: var(--white-color);
  font-weight: 500;
}

.login__register a:hover {
  text-decoration: underline;
}

/**===================BREACKPOINTS======================= */
@media screen and (min-width: 576px) {
  .login {
    justify-content: center;
  }
  .login__form {
    width: 420px;
    padding-inline: 2.5rem;
  }
  .login__title {
    margin-bottom: 2rem;
  }
}
</style>
