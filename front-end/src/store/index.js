import Vue from 'vue'
import Vuex from 'vuex'
import {auth} from "@/store/modules/auth";
import axios from "axios";

Vue.use(Vuex);

axios.defaults.baseURL = "http://127.0.0.1:8000/api/v1/";
axios.defaults.headers.Accept = "application/json";

const store = new Vuex.Store({
    state: {
        fastRegisterEmail: 'adasda',
        isLoadingButton: false
    },
    mutations: {
        setFastRegisterEmail(state, payload) {
            state.fastRegisterEmail = payload;
        },
        setIsLoadingButton(state, payload) {
            state.isLoadingButton = payload;
        }
    },
    actions: {},
    modules: {
        auth
    }
});

export default store;
