import axios from "axios";

export const meMentorProgram = {
    state: {},
    mutations: {},
    actions: {
        getMeMentorPrograms() {
            axios.get('/me/mentor-programs')
                .then(res => {
                    console.log(res);
                })
        }
    },
    getters: {}
}
