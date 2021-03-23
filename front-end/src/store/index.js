import Vue from 'vue'
import Vuex from 'vuex'
import {auth} from "@/store/modules/auth";

Vue.use(Vuex);

const store = new Vuex.Store({
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
});

export default store;
