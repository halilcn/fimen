import axios from "axios";

export const auth = {
    state: {
        userToken: '',
        user: {
            username: '',
            image: ''
        }
    },
    mutations: {
        setToken(state, payload) {
            localStorage.setItem('user_token', payload);
            state.userToken = payload;
        },
        setState(state) {
            const token = localStorage.getItem('user_token');
            if (token) {
                state.userToken = token;
            }

            // user
        }
        /*setUser(state, payload) {
            state.user=
            JSON.parse(localStorage.getItem('user'));
        }*/

    },
    actions: {
        async postLogin({commit}, payload) {
            return await axios.post('/login', payload)
                .then(res => {
                    commit('setToken', res.data.token);

                });
        },
        postRegister() {

        },
        getMeInfo() {

        }
    },
    getters: {
        checkAuth(state) {
            console.log(state.userToken);
            return state.userToken !== '';
        }
    },
    modules: {}
}
