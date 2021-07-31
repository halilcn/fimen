import axios from "axios";
import router from "@/router";

export const mentorMenteeProgramMessage = {
    state: {
        messages: []
    },
    mutations: {},
    actions: {
        getMentorMenteeProgramMessages() {
            axios.get(`/mentor-mentee-programs/${router.currentRoute.params.id}/messages`)
                .then(res => {
                    console.log(res);
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
