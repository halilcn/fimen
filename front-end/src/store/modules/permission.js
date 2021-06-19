import axios from "axios";

export const permission = {
    state: {},
    mutations: {},
    actions: {
        getPermissionsAndNotifications() {
            return axios.get('me/permissions')
                .then(res => {
                    return res.data.data;
                })
        }
    },
    getters: {}
};