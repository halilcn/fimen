import Vue from 'vue'
import Vuex from 'vuex'
import {auth} from "@/store/modules/auth";
import {mentor} from "@/store/modules/mentor";
import axios from "axios";

Vue.use(Vuex);

axios.defaults.baseURL = "http://127.0.0.1:8000/api/v1/";
axios.defaults.headers.Accept = "application/json";
axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('user_token')}`;

//axios.defaults.headers.Authorization = '';

const store = new Vuex.Store({
    state: {
        fastRegisterEmail: '',
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
        auth,
        mentor,
    }
});

export default store;
