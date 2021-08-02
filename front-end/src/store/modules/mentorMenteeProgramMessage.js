import axios from "axios";
import router from "@/router";

export const mentorMenteeProgramMessage = {
    state: {
        messages: [],
        user: {}
    },
    mutations: {
        setMessages(state, payload) {
            state.messages = payload;
        },
        setUser(state, payload) {
            state.user = payload;
        }
    },
    actions: {
        getMentorMenteeProgramMessages({commit}) {
            axios.get(`/mentor-mentee-programs/${router.currentRoute.params.id}/messages`)
                .then(res => {
                    console.log(res);
                    commit('setMessages', res.data.data.messages);
                    commit('setUser', res.data.data.user);
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
