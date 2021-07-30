import axios from "axios";
import router from "@/router";

export const mentorMenteeProgramMessage = {
    state: {
        messages: []
    },
    mutations: {},
    actions: {
        postMentorMenteeProgramMessage(_, payload) {
            axios.post(`/mentor-mentee-programs/${router.currentRoute.params.id}/messages`, payload, {
                headers: {"Content-Type": "multipart/form-data"}
            })
                .then(res => {
                    console.log(res);
                })
        }
    },
    getters: {}
}
