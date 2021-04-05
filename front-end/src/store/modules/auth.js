import axios from "axios";

export const auth = {
    state: {
        userToken: '',
        registerUser: {},
        user: {}
    },
    mutations: {
        setState(state) {
            // Token
            const token = localStorage.getItem('user_token');
            if (token) {
                state.userToken = token;
                // User Info
                state.user = JSON.parse(localStorage.getItem('user'));
            }
        },
        removeStateAndStorage(state) {
            state.userToken = '';
            state.user = '';

            localStorage.removeItem('user_token');
            localStorage.removeItem('user');
        },
        setToken(state, payload) {
            localStorage.setItem('user_token', payload);
            state.userToken = payload;
        },
        setUser(state, payload) {
            state.user = payload;
            localStorage.setItem('user', JSON.stringify(payload));
        },
        setRegisterUser(state, payload) {
            state.registerUser = payload;
        },
        setRegisterUserEmail(state, payload) {
            state.registerUser.email = payload;
        }
    },
    actions: {
        async postLogin({commit, dispatch}, payload) {
            return await axios.post('/login', payload)
                .then(res => {
                    commit('setToken', res.data.token);
                    dispatch('getMeInfo');
                });
        },
        async postRegister({state, dispatch, commit}) {
            return await axios.post('/register', {...state.registerUser})
                .then((res) => {
                    commit('setToken', res.data.token);
                    dispatch('getMeInfo');
                })
                .catch((err) => {
                    throw err.response;
                });
        },
        async postEmailVerification({getters}) {
            return await axios.post('/email-verification-send', getters.registerUserEmailVerificationData);
        },
        async postEmailCode({getters, commit}, payload) {
            return await axios.post('/email-verification-verify', getters.emailCodeData(payload))
                .then((res) => {
                    commit('setRegisterUserEmail', res.data.email);
                })
                .catch((err) => {
                    throw err.response;
                });
        },
        registerStep1({commit}, payload) {
            commit('setRegisterUser', payload);
        },
        registerStep2({dispatch}, payload) {
            return dispatch('postEmailCode', payload)
                .then(() => {
                    return dispatch('postRegister');
                })
                .catch((err) => {
                    throw err;
                });
        },
        checkUsername(_, payload) {
            return axios.post('/register-check/username', {username: payload})
                .then(() => {
                    return true;
                })
                .catch(() => {
                    return false;
                });
        },
        checkEmail(_, payload) {
            return axios.post('/register-check/email', {email: payload})
                .then(() => {
                    return true;
                })
                .catch(() => {
                    return false;
                });
        },
        async getMeInfo({commit, state}) {
            await axios.get('/me', {
                headers: {
                    "Authorization": `Bearer ${state.userToken}`
                }
            })
                .then(res => {
                    commit('setUser', res.data.data);
                });
        },
        postLogout({commit}) {
            return axios.post('/logout')
                .then(() => {
                    commit('removeStateAndStorage');
                });
        }
    },
    getters: {
        checkAuth(state) {
            return state.userToken !== '';
        },
        registerUserEmailVerificationData(state) {
            return {
                email: state.registerUser.email,
                username: state.registerUser.username
            };
        },
        emailCodeData(state) {
            return function (payload) {
                return {
                    email: state.registerUser.email,
                    code: payload
                }
            }
        },
        checkRegisterUser(state) {
            return state.registerUser === '';
        }
    }
}
