import axios from "axios";
import router from "@/router";

export const mentorMenteeProgramMessage = {
    state: {
        messages: []
    },
    mutations: {},
    actions: {
        postMentorMenteeProgramMessage(_, payload) {
            console.log(payload);
            axios.post(`/mentor-mentee-programs/${router.currentRoute.params.id}/messages`, payload)
                .then(res => {
                    console.log(res);
                })
        }
    },
    getters: {}
}
