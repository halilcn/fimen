import Vue from 'vue'
import Vuex from 'vuex'
import {auth} from "@/store/modules/auth";
import {meSetting} from "@/store/modules/meSetting";
import {mentor} from "@/store/modules/mentor";
import {mentorProgram} from "@/store/modules/mentorProgram";
import {user} from "@/store/modules/user";
import {meMentorProgram} from "@/store/modules/meMentorProgram";
import {mentorMenteeProgram} from "@/store/modules/mentorMenteeProgram";
import {mentorMenteeProgramMessage} from "@/store/modules/mentorMenteeProgramMessage";
import {notification} from "@/store/modules/notification";
import {option} from "@/store/modules/option";
import axios from "axios";

Vue.use(Vuex);

axios.defaults.baseURL = "http://127.0.0.1:8000/api/v1/";
axios.defaults.headers.Accept = "application/json";
axios.defaults.headers.common['Authorization'] = `Bearer ${localStorage.getItem('user_token')}`;

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
        meSetting,
        mentor,
        mentorProgram,
        user,
        meMentorProgram,
        mentorMenteeProgram,
        notification,
        mentorMenteeProgramMessage,
        permission: option
    }
});

export default store;
