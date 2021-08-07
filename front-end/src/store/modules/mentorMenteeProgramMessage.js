import axios from "axios";
import router from "@/router";
import moment from "moment";

moment.locale("tr");
const NOW_TIME = moment().format('DD MMMM Y');

export const mentorMenteeProgramMessage = {
    state: {
        messageList: [],
        fromUserInformation: {}
    },
    mutations: {
        setMessageList(state, payload) {
            state.messageList = payload;
        },
        destroyMessageList(state) {
            state.messageList = [];
        },
        setMyMessage(state, payload) {
            if (state.messageList[NOW_TIME]) {
                state.messageList[NOW_TIME].push(payload);
            } else {
                state.messageList[NOW_TIME] = [payload];
            }
        },
        setFromUserInformation(state, payload) {
            state.fromUserInformation = payload;
        },
    },
    actions: {
        getMentorMenteeProgramMessages({commit}) {
            axios.get(`/mentor-mentee-programs/${router.currentRoute.params.id}/messages`)
                .then(res => {
                    commit('setMessageList', res.data.data.messages);
                    commit('setFromUserInformation', res.data.data.fromUserInformation);
                })
        },
        postMentorMenteeProgramMessage({commit}, payload) {
            axios.post(`/mentor-mentee-programs/${router.currentRoute.params.id}/messages`, payload, {
                headers: {"Content-Type": "multipart/form-data"}
            })
                .then(res => {
                    commit('setMyMessage', res.data.data);
                })
        },
        deleteMentorMenteeProgramMessages({commit}) {
            return axios.delete(`mentor-mentee-programs/${router.currentRoute.params.id}/messages`)
                .then(() => {
                    commit('destroyMessageList');
                });
        }
    },
    getters: {}
}
