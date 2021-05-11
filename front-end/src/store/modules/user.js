import axios from "axios";
import router from "@/router";

export const user = {
    state: {},
    mutations: {},
    actions: {
        getUser() {
            return axios.get(`/user/${router.currentRoute.params.username}`);
        },
        searchUser(_, payload) {
            return axios.get(`/user?search=${payload}`)
                .then(res => {
                    console.log(res.data.data);
                    return res.data.data;
                })
        }
    },
    getters: {}
}
