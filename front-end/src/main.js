import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import Vuelidate from 'vuelidate'
import {errors} from "@/errors";

Vue.config.productionTip = false
//Import Global Errors
Vue.prototype.$errors = errors;

Vue.use(Vuelidate);

new Vue({
    router,
    store,
    render: h => h(App)
}).$mount('#app')
