import axios from "axios";
import router from "@/router";

export const mentorMenteeProgramMessage = {
    state: {
        messageList: [],
        from_user_information: {}
    },
    mutations: {
        setMessageList(state, payload) {
            state.messageList = payload;
        },
        setMyTextMessage(state, payload) {
            console.log(payload);

            state.messageList['5 Temmuz 2021']


            return 0;
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
        postMentorMenteeProgramMessage(_, payload) {
            return axios.post(`/mentor-mentee-programs/${router.currentRoute.params.id}/messages`, payload, {
                headers: {"Content-Type": "multipart/form-data"}
            })
                .then(res => {
                    console.log(res);
                    return res.data;
                })
        },
    },
    getters: {}
}
