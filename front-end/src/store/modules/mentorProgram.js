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
                    console.log(res.data.data);
                    commit('setMentorProgram', res.data.data);
                })
        },
        getMoreMentorPrograms() {

        },
        // state eklenecek mi?
        postMentorProgram(_, payload) {
            axios.post('mentor-programs', payload)
                .then(res => {
                    console.log(res);
                });
        }
    },
    getters: {}
}
