import axios from "axios";
import router from "@/router";

export const user = {
    state: {},
    mutations: {},
    actions: {
        getUser() {
            return axios.get(`/user/${router.currentRoute.params.username}`);
        }
    },
    getters: {}
}
