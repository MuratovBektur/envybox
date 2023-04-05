<script setup lang="ts">
import { computed } from 'vue'
import { useRouter } from 'vue-router'
import { useStore } from 'vuex'

const store = useStore()
const router = useRouter()

const formList = computed(() => store.state.formList)
</script>

<template>
  <div v-if="formList.length" class="pb-5">
    <div class="bg-white p-5 mt-5" v-for="form of formList" :key="form.id">
      <div>Имя: {{ form.name }}</div>
      <div class="mt-2">Обращение: {{ form.appeal }}</div>
    </div>
  </div>
  <div class="font-bold text-center text-xl" v-else>Form List empty</div>
  <div class="flex justify-center">
    <button @click="router.push('/')" class="button">Добавить форму</button>
  </div>
</template>
