import axios from "axios";

export const meMentorProgram = {
    state: {
        programs: []
    },
    mutations: {
        clearMeMentorPrograms(state) {
            state.programs = [];
        },
        destroyMeMentorProgram(state, programId) {
            state.programs.forEach((program, index) => {
                if (program.id === programId) {
                    state.programs.splice(index, 1);
                    return 0;
                }
            })
        }
    },
    actions: {
        getMeMentorPrograms({state, commit}) {
            commit('clearMeMentorPrograms');
            return axios.get('/me/mentor-programs')
                .then(res => {
                    state.programs = res.data.data;
                })
        },
        postDestroyMeMentorProgram({commit}, payload) {
            axios.delete(`/me/mentor-programs/${payload}`)
                .then((res) => {
                    console.log(res);
                    commit('destroyMeMentorProgram', payload);
                })
        }
    },
    getters: {}
}
