import axios from "axios";
import router from "@/router";

export const mentorMenteeProgram = {
    state: {},
    mutations: {},
    actions: {
        postMenteeConfirmation(_, payload) {
            return axios.post('/mentor-mentee-programs', {
                ...payload,
                program_slug: router.currentRoute.params.slug
            });
        },
        getMentorMenteePrograms() {
            axios.get('/mentor-mentee-programs')
                .then(res => {
                    console.log(res);
                })
        }
    },
    getters: {}
}
