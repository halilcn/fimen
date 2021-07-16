import axios from "axios";
import router from "@/router";

export const mentorMenteeProgram = {
    state: {
        isMentor: false
    },
    mutations: {
        setMentorStatus(state, payload) {
            state.isMentor = payload;
        }
    },
    actions: {
        postMenteeConfirmation(_, payload) {
            return axios.post('/mentor-mentee-programs', {
                ...payload,
                program_slug: router.currentRoute.params.slug
            });
        },
        getMentorMenteePrograms() {
            return axios.get('/mentor-mentee-programs')
                .then(res => {
                    return res.data.data;
                })
        },
        getMentorMenteeProgramDetail({commit}) {
            return axios.get(`/mentor-mentee-programs/${router.currentRoute.params.id}`)
                .then(res => {
                    commit('setMentorStatus', res.data.data.is_mentor);
                    return res.data.data;
                });
        },
        getMentorMenteeProgramDetailInfo() {
            return axios.get(`/mentor-mentee-programs/${router.currentRoute.params.id}/information`)
                .then(res => {
                    return res.data.data;
                });
        },
        postMentorMenteeProgramMeeting(_, payload) {
            return axios.post(`/mentor-mentee-programs/${router.currentRoute.params.id}/meetings`, payload)
        },
        getMentorMenteeProgramMeetings() {
            return axios.get(`/mentor-mentee-programs/${router.currentRoute.params.id}/meetings`)
                .then(res => {
                    console.log(res);
                    return res.data.data;
                });
        },
        destroyMentorMenteeProgram() {
            return axios.delete(`/mentor-mentee-programs/${router.currentRoute.params.id}`);
        }
    },
    getters: {}
}
