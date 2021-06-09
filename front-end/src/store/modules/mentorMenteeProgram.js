import axios from "axios";
import router from "@/router";

export const mentorMenteeProgram = {
    state: {},
    mutations: {},
    actions: {
        postMenteeConfirmation(_, payload) {
            axios.post('/mentor-mentee-programs', {...payload, program_slug: router.currentRoute.params.slug})
                .then(res => {
                    console.log(res);
                })
        }
    },
    getters: {}
}
