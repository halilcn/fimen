import axios from "axios";
import router from "@/router";

export const meMentorProgram = {
    state: {
        programs: []
    },
    mutations: {
        clearMeMentorPrograms(state) {
            state.programs = [];
        },
        destroyMeMentorProgram(state, programSlug) {
            state.programs.forEach((program, index) => {
                if (program.slug === programSlug) {
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
        getMeMentorProgramDetail() {
            return axios.get(`/me/mentor-programs/${router.currentRoute.params.slug}`)
                .then(res => {
                    return res.data.data;
                })
        },
        postDestroyMeMentorProgram({commit}, payload) {
            axios.delete(`/me/mentor-programs/${payload}`)
                .then(() => {
                    commit('destroyMeMentorProgram', payload);
                })
        },
        getMeMentorProgramAnswers(_, payload) {
            return axios.get(`/me/mentor-programs/${router.currentRoute.params.slug}/answers/${payload}`)
                .then(res => {
                    return res.data;
                });
        }
    },
    getters: {}
}
