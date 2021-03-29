import axios from "axios";

export const auth = {
    state: {},
    mutations: {},
    actions: {
        postLogin(_, payload) {
            return axios.post('/login', payload)
                .then(res => {
                    console.log(res);
                })
                .catch(err => {
                    console.log(err.response.status);
                })
        }
    },
    getters: {
        checkAuth() {
            return true;
        }
    },
    modules: {}
}
