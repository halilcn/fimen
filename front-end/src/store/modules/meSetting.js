import axios from "axios";

export const meSetting = {
    state: {},
    mutations: {},
    actions: {
        getMeSettings() {
            /*!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! api ?? */
            return axios.get('/me/settings/settings')
                .then(res => {
                    return res.data.data;
                })
                .catch(() => {
                    alert('Bir hata oluştu');
                });
        },
        postMeSettings(_, payload) {
            axios.post('/me/settings/settings', payload, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
                .then(res => {
                    console.log(res)
                })
                .catch(err => {
                    console.log(err);
                })
        }
    },
    getters: {}
}
