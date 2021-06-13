import axios from "axios";

export const notification = {
    state: {},
    mutations: {},
    actions: {
        getNotifications() {
            return axios.get('/me/notifications');
        }
    },
    getters: {}
};