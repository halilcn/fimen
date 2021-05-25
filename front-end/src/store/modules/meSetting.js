import axios from "axios";

export const meSetting = {
    state: {},
    mutations: {
        setUserSettings(_, payload) {
            this.state.auth.user.name_surname = payload.get('name');
            if (payload.get('image_file')) {
                this.state.auth.user.image = URL.createObjectURL(payload.get('image_file'));
            }
        }
    },
    actions: {
        getMeSettings() {
            return axios.get('/me/settings')
                .then(res => {
                    return res.data.data;
                })
                .catch(() => {
                    alert('Bir hata oluştu');
                });
        },
        postMeSettings({commit}, payload) {
            return axios.post('/me/settings', payload, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
                .then((res) => {
                    commit('setUserSettings', payload);
                    return res.data.data;
                });
        }
    },
    getters: {}
}
