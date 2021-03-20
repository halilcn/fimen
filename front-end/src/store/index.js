import {createStore} from 'vuex'
import {auth} from "@/store/modules/auth";

export default createStore({
    state: {
        fastRegisterEmail: 'adasda'
    },
    mutations: {
        setFastRegisterEmail(state, payload) {
            state.fastRegisterEmail = payload;
        }
    },
    actions: {},
    modules: {
        auth
    }
})
