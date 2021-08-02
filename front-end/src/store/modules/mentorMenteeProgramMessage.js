import axios from "axios";
import router from "@/router";

export const mentorMenteeProgramMessage = {
    state: {
        messages: [],
        from_user_information: {}
    },
    mutations: {
        setMessages(state, payload) {
            state.messages = payload;
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
                    commit('setMessages', res.data.data.messages);
                    commit('setFromUserInformation', res.data.data.from_user_information);
                })
        },
        postMentorMenteeProgramMessage(_, payload) {
            axios.post(`/mentor-mentee-programs/${router.currentRoute.params.id}/messages`, payload, {
                headers: {"Content-Type": "multipart/form-data"}
            })
                .then(res => {
                    console.log(res);
                })
        },
    },
    getters: {}
}
