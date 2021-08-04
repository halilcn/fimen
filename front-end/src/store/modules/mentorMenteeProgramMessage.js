import axios from "axios";
import router from "@/router";
import moment from "moment";

moment.locale("tr");
const NOW_TIME = moment().format('DD MMMM Y');

export const mentorMenteeProgramMessage = {
    state: {
        messageList: [],
        from_user_information: {}
    },
    mutations: {
        setMessageList(state, payload) {
            state.messageList = payload;
        },
        setMyMessage(state, payload) {
            if (state.messageList[NOW_TIME]) {
                state.messageList[NOW_TIME].push(payload);
            } else {
                state.messageList[NOW_TIME] = [payload];
            }
        },
        setFromUserInformation(state, payload) {
            state.from_user_information = payload;
        }
    },
    actions: {
        getMentorMenteeProgramMessages({commit}) {
            axios.get(`/mentor-mentee-programs/${router.currentRoute.params.id}/messages`)
                .then(res => {
                    console.log(res);
                    commit('setMessageList', res.data.data.messages);
                    commit('setFromUserInformation', res.data.data.from_user_information);
                })
        },
        postMentorMenteeProgramMessage({commit}, payload) {
            return axios.post(`/mentor-mentee-programs/${router.currentRoute.params.id}/messages`, payload, {
                headers: {"Content-Type": "multipart/form-data"}
            })
                .then(res => {
                    commit('setMyMessage', res.data.data);
                })
        },
    },
    getters: {}
}
