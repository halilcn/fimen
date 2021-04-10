import axios from "axios";

export const competence = {
    state: {
        competencies: []
    },
    mutations: {
        setCompetencies(state, payload) {
            state.competencies = payload;
        }
    },
    actions: {
        getCompetencies({commit}) {
            axios.get('/competencies')
                .then((res) => {
                    commit('setCompetencies', res.data);
                });
        }
    },
    getters: {}
}
