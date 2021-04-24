import axios from "axios";

export const mentorProgram = {
    state: {
        programs: []
    },
    mutations: {
        setMentorProgram(state, payload) {
            state.programs = payload;
        },
        setMoreMentorPrograms(state, payload) {
            payload.map(function (value) {
                state.programs.push(value);
            });
        }
    },
    actions: {
        getMentorPrograms({commit}) {
            return axios.get('/mentor-programs')
                .then(res => {
                    commit('setMentorProgram', res.data.data);
                })
        },
        getMoreMentorPrograms() {

        }
    },
    getters: {}
}
