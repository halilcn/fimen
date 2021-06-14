import axios from "axios";

export const notification = {
    state: {},
    mutations: {},
    actions: {
        getNotifications() {
            return axios.get('/me/notifications');
        },
        destroyNotifications() {
            // 0 ide ne alaka ? yanlış!
            axios.delete('/me/notifications/0');
        }
    },
    getters: {}
};