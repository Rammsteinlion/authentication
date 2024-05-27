<script setup lang="ts">
import { reactive, onMounted } from "vue";
import store from "@/store/store";
import TaskList from "@/components/TaskList.vue";
import {getTaskService,getDataTask} from '@/services';

const params = reactive<{ data:{} }>({ data: {} });

onMounted(() =>{
  // onGetTask();
})

const onAddTask = (event: any) => {
  const input = event.target;
  const newTask = input.value.trim();
  if(newTask ==""){
    alert('NO puedes ingresar valores vacios');
  }
  
}

const onGetTask = async():Promise<void> =>{
  const getTask = await getTaskService();
  console.log(getTask);
  
}

const clearDataTask = async():Promise<void> =>{
  const getTask = await getDataTask();
  console.log(getTask);
}

</script>

<template>
  <div class="home-background bg-[#E3F2FD]">
    <div class="wrapper">
      <header>Todo App</header>
      <div class="inputField flex gap-1">
        <input type="text" placeholder="Add your new todo"  @keyup.enter="onAddTask($event)" />
        <button class="w-[50px] h-[100%] bg-[#721ce3] hover:bg-[#8e49e8] hover:scale-[1.1] rounded-md text-white" @click.stop="onAddTask($event)"><i class="fas fa-plus"></i></button>
      </div>
      <div>
          <input type="button" class="text-white bg-green-400 hover:bg-green-500  font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2" value="Iniciadas">
          <input type="button" class="text-white bg-blue-400 hover:bg-blue-500  font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2" value="Terminadas">
          <input type="button" class="text-white bg-orange-300 hover:bg-orange-500  font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2" value="Eliminadas">
        </div>

      <div class="containerList h-[256px] overflow-y-scroll">
        
        <ul class="todoList flex flex-col gap-[0.65em]">
          <li v-for="n in 20">
            <task-list />
          </li>
        </ul>
      </div>
      <div class="footer">
        <span>You have <span class="pendingTasks"></span> pending tasks</span>
        <button @click="clearDataTask">Clear All</button>
      </div>
    </div>
  </div>
</template>

<style scoped>
.home-background {
  background-size: cover;
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
}

.wrapper {
  background: #fff;
  max-width: 400px;
  width: 100%;
  height: 30em;
  padding: 25px;
  border-radius: 5px;
  box-shadow: 0px 10px 15px rgba(0, 0, 0, 0.1);
  margin: 20px; 
}

.wrapper header {
  font-size: 30px;
  font-weight: 600;
}

.wrapper .inputField {
  margin: 20px 0;
  width: 100%;
  display: flex;
  height: 45px;
}

.inputField input {
  width: 85%;
  height: 100%;
  outline: none;
  border-radius: 3px;
  border: 1px solid #ccc;
  font-size: 17px;
  padding-left: 15px;
  transition: all 0.3s ease;
}


.inputField input:focus {
  border-color: #8e49e8;
}

/*
.inputField button {
  width: 50px;
  height: 100%;
  border: none;
  color: #fff;
  margin-left: 5px;
  font-size: 21px;
  outline: none;
  background: #8e49e8;
  cursor: pointer;
  border-radius: 3px;
  opacity: 0.6;
  pointer-events: none;
  transition: all 0.3s ease;
}

.inputField button:hover,
.footer button:hover {
  background: #721ce3;
}
/* 
.inputField button.active {
  opacity: 1;
  pointer-events: auto;
} */ 

.footer {
  margin-top: 20px; /* Aseguramos que el pie de página esté separado del contenido */
}

.footer button {
  background: #8e49e8;
  color: white;
  border: none;
  padding: 10px 20px;
  border-radius: 3px;
  cursor: pointer;
  transition: background 0.3s ease;
}

.todoList li .icon {
  position: absolute;
  right: -45px;
  top: 50%;
  transform: translateY(-50%);
  background: #e74c3c;
  width: 45px;
  text-align: center;
  color: #fff;
  padding: 10px 15px;
  border-radius: 0 3px 3px 0;
  cursor: pointer;
  transition: all 0.2s ease;
}

.containerList {
  /* Styles for the container holding the scrollable content */
  position: relative;
}

.containerList::-webkit-scrollbar {
  width: 8px; /* Tamaño del scroll en vertical */
  height: 8px; /* Tamaño del scroll en horizontal */
  /* display: none;  Ocultar scroll */
}

.containerList::-webkit-scrollbar-thumb {
  background: #ccc;
  border-radius: 4px;
}

/* Cambiamos el fondo y agregamos una sombra cuando esté en hover */
.containerList::-webkit-scrollbar-thumb:hover {
  background: #b3b3b3;
  box-shadow: 0 0 2px 1px rgba(0, 0, 0, 0.2);
}

/* Cambiamos el fondo cuando esté en active */
.containerList::-webkit-scrollbar-thumb:active {
  background-color: #999999;
}

.containerList::-webkit-scrollbar-track {
  background: #e1e1e1;
  border-radius: 4px;
}

/* Cambiamos el fondo cuando esté en active o hover */
.containerList::-webkit-scrollbar-track:hover,
.containerList::-webkit-scrollbar-track:active {
  background: #d4d4d4;
}

/* Styles for the ul inside the scrollable container */
.todoList {
  margin: 0;
  padding: 0;
  list-style: none;
}
</style>
