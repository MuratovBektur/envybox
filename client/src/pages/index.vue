<script setup lang="ts">
import { computed, ref } from 'vue'
import { useStore } from 'vuex'
import { useRouter } from 'vue-router'

import type { IForm } from '@/types'
import api from '@/libs/api'

const store = useStore()
const router = useRouter()

const form = ref<IForm>({
  id: Date.now(),
  name: '',
  appeal: ''
})

const startSendForm = ref<boolean>(false)

const isValidForm = computed<boolean>(() => !!form.value.name && !!form.value.appeal)

const canSendForm = computed<boolean>(() => !isValidForm.value && startSendForm.value)

const showAllFilledFormBtn = computed<boolean>(() => store.state.formList.length)

function goToFormListPage() {
  router.push('/form-list')
}

async function sendForm() {
  startSendForm.value = true
  if (!isValidForm.value) return
  try {
    await api.post('form', form.value)
    store.commit('addForm', form.value)
    goToFormListPage()
  } catch (err) {
    console.error(err)
  }
}
</script>

<template>
  <div>
    <h2 class="text-center font-bold text-2xl pb-6">Форма обратной связи</h2>
    <input
      class="input"
      :class="{ 'input-dangerous': startSendForm && !form.name }"
      v-model="form.name"
      type="text"
      placeholder="Ваше имя"
    />
    <textarea
      class="input mt-5"
      v-model="form.appeal"
      :class="{ 'input-dangerous': startSendForm && !form.appeal }"
      rows="4"
      type="text"
      placeholder="Ваше обращение"
    />
    <div class="h-5 pt-2">
      <div class="text-red-500" v-if="canSendForm">Заполните все поля</div>
    </div>
    <div class="flex justify-center space-x-4">
      <button
        @click="sendForm"
        class="button"
        :class="{
          'button-disabled': canSendForm
        }"
      >
        Отправить
      </button>
      <button v-if="showAllFilledFormBtn" @click="goToFormListPage" class="button">Все поля</button>
    </div>
  </div>
</template>
