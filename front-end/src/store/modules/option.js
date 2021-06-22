import axios from "axios";

export const option = {
    state: {},
    mutations: {},
    actions: {
        getPermissionsAndNotifications() {
            return axios.get('me/options')
                .then(res => {
                    return res.data.data;
                })
        },
        postPermissionsAndNotifications(_, payload) {
            axios.patch(`me/options/${payload.type}`, {...payload});
        }
    },
    getters: {}
};