import axios from "axios";
import router from "@/router";

export const mentorProgram = {
    state: {
        programs: []
    },
    mutations: {
        setMentorPrograms(state, payload) {
            state.programs = payload;
        },
        setMoreMentorPrograms(state, payload) {
            payload.map(value => {
                state.programs.push(value);
            });
        }
    },
    actions: {
        getMentorPrograms({commit}, payload) {
            return axios.get('/mentor-programs', {
                params: {...payload}
            })
                .then(res => {
                    commit('setMentorPrograms', res.data.data);
                })
        },
        getMoreMentorPrograms({commit, getters}, payload) {
            payload.lastProgramDeadline = getters.getLastProgramDeadline;
            return axios.get('/mentor-programs', {
                params: {...payload}
            })
                .then(res => {
                    commit('setMoreMentorPrograms', res.data.data);
                    return res.data.data.length === 0;
                })
        },
        postMentorProgram({commit, dispatch}, payload) {
            return axios.post('mentor-programs', payload)
                .then(() => {
                    commit('setShowPopup', false);
                    dispatch('getMentorPrograms');
                });
        },
        getMentorProgramDetails() {
            return axios.get(`/mentor-programs/${router.currentRoute.params.slug}`)
                .then(res => {
                    return res.data.data;
                });
        },
        postProgramApply() {
            alert();
        }
    },
    getters: {
        getLastProgramDeadline(state) {
            return state.programs.length !== 0 ? state.programs[state.programs.length - 1].deadline : 'now';
        }
    }
}
