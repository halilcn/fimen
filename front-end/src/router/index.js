import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const checkAuth = () => {
    return false;
    // return store.getters.checkToken;
};

const auth = (to, from, next) => {
    return checkAuth() === true ? next() : next('/giris');
}

const guest = function (to, from, next) {
    return checkAuth() === false ? next() : next('/');
}

const routes = [
    {
        path: '/anasayfa',
        component: () => import('@/components/others/HomePage'),
        beforeEnter: guest
    },
    {
        path: '/giris',
        name: 'Login',
        component: () => import('@/components/authPages/Login'),
        beforeEnter: guest
    },
    {
        path: '/kayit',
        name: 'Register',
        component: () => import('@/components/authPages/Register'),
        beforeEnter: guest
    },
    {
        path: '/',
        component: () => import('@/components/mainPage/Home'),
        beforeEnter: auth,
        children: [
            {
                path: '/',
                component: () => import('@/components/mainPage/MainPage'),
            },
        ]
    },
]

const router = new VueRouter({
    mode: 'history',
    routes
})

export default router
