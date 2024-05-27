<script setup lang="ts">
import { ref } from 'vue';
const props = withDefaults(
    defineProps<{
        data?: { [key: string]: string };
    }>(),
    {}
);


const taskCompleted = ref<boolean>(false);

const completeTask = ():void =>{
  taskCompleted.value = !taskCompleted.value;
}
</script>
<template>
  <div
    class="flex items-center gap-4 bg-[#F2F3F4] shadow-[0_4px_4px_0px_rgba(0,0,0,0.10)] rounded-lg h-[4em] px-3"
  >
  <input type="checkbox" name="" id="" @click="completeTask">
    <div class="flex flex-col gap-1">
      <span :class="['font-medium', {'line-through': taskCompleted}]">Name task</span>
      <small>AAAA-MM-DD</small>
    </div>
    <div class="ml-auto hover:scale-[1.1]">
      <i class="fa-solid fa-trash-can"></i>
    </div>
  </div>
</template>
<style scoped>
/**TASK */
.line-through {
  text-decoration: line-through;
}
</style>
