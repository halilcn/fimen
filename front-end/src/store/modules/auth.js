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
            }
        },
        removeStateAndStorage(state) {
            state.userToken = '';
            localStorage.removeItem('user_token');
        },
        setToken(state, payload) {
            localStorage.setItem('user_token', payload);
            state.userToken = payload;
        },
        setUser(state, payload) {
            console.log(payload);
            state.user = payload;
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
                    commit('setShowMentorAppeal', true);
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
        },
        postFavoriteUser(_, payload) {
            axios.post('/favorite-users', payload)
                .catch(() => {
                    alert('Bir hata oluştu')
                })
        },
        deleteFavoriteUser(_, payload) {
            axios.delete(`/favorite-users/${payload.user_id}`)
                .catch(() =>
                    alert('Bir hata oluştu')
                )
        },
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
        getMeProfileUrl(state) {
            return 'profil/' + state.user.username;
        },
        checkRegisterUser(state) {
            return state.registerUser === '';
        },
        checkMentorState(state) {
            return typeof state.user.mentor.status == 'undefined' ? null : state.user.mentor.status;
        },
        isMentor(_, getters) {
            return getters.checkMentorState == null;
        },
        hasMentorAppeal(_, getters) {
            if (getters.isMentor) {
                return false;
            }
            return getters.checkMentorState;
        },
    }
}
