import axios from "axios";

export const mentor = {
    state: {
        competencies: []
    },
    mutations: {
        setCompetencies(state, payload) {
            state.competencies = payload;
        },
        setMentorStatus(state) {
            state.auth.user.mentor.status = true;
        }
    },
    actions: {
        getCompetencies({commit}) {
            axios.get('/competencies')
                .then((res) => {
                    commit('setCompetencies', res.data);
                });
        },
        postMentorAppeal({commit}, payload) {
            return axios.post('mentor-appeal', payload, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
                .then(() => {
                    commit('setMentorStatus');
                });

        }
    },
    getters: {}
}
