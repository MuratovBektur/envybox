import { createStore } from 'vuex'
import type { IForm } from '@/types'

interface IState {
  formList: IForm[]
}

export default createStore<IState>({
  state: {
    formList: []
  },
  mutations: {
    addForm(state, form: IForm) {
      state.formList.push(form)
    }
  }
})
