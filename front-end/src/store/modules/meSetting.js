import axios from "axios";

export const meSetting = {
    state: {},
    mutations: {},
    actions: {
        getMeSettings() {
            return axios.get('/me/settings/settings')
                .then(res => {
                    return res.data.data;
                })
                .catch(() => {
                    alert('Bir hata oluştu');
                });
        }
    },
    getters: {}
}
