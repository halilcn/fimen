import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import Vuelidate from 'vuelidate'
import {errors} from "@/helpers/errors";
import {helper} from "@/helpers/helper";
import filters from "@/filters/index";
import moment from 'moment'

//Set Default Locale
moment.locale("tr");

//Import Global Errors
Vue.prototype.$errors = errors;
Vue.prototype.$helper = helper;
Vue.prototype.moment = moment

//Mixin
Vue.mixin({
    filters: filters
})

Vue.config.productionTip = false
Vue.use(Vuelidate);

new Vue({
    router,
    store,
    render: h => h(App)
}).$mount('#app')
