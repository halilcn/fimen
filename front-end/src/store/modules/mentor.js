import axios from "axios";

export const mentor = {
    state: {
        competencies: [],
        newMentors: []
    },
    mutations: {
        setCompetencies(state, payload) {
            state.competencies = payload;
        },
        setMentorStatus() {
            this.state.auth.user.mentor.status = true;
        },
        setNewMentors(state, payload) {
            state.newMentors = payload;
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
        },
        getNewMentors({commit}) {
            return axios.get('new-mentors')
                .then(res => {
                    commit('setNewMentors', res.data.data);
                })
        }
    },
    getters: {}
}
