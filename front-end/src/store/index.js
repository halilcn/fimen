import Vue from 'vue'
import Vuex from 'vuex'
import {auth} from "@/store/modules/auth";
import {mentor} from "@/store/modules/mentor";
import {mentorProgram} from "@/store/modules/mentorProgram";
import axios from "axios";

Vue.use(Vuex);

axios.defaults.baseURL = "http://127.0.0.1:8000/api/v1/";
axios.defaults.headers.Accept = "application/json";
axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('user_token')}`;

//axios.defaults.headers.Authorization = '';

const store = new Vuex.Store({
    state: {
        fastRegisterEmail: '',
        showMentorAppealAlert: false,
        isShowPopup: false
    },
    mutations: {
        setFastRegisterEmail(state, payload) {
            state.fastRegisterEmail = payload;
        },
        setShowMentorAppeal(state, payload) {
            state.showMentorAppealAlert = payload;
        },
        setShowPopup(state, payload) {
            state.isShowPopup = payload;
        }
    },
    actions: {},
    modules: {
        auth,
        mentor,
        mentorProgram
    }
});

export default store;
