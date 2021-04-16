import Vue from 'vue'
import VueRouter from 'vue-router'
import store from "@/store";

Vue.use(VueRouter)

const checkAuth = () => {
    return store.getters.checkAuth;
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
        path: '/kayit/email-dogrulama',
        name: 'EmailVerification',
        component: () => import('@/components/authPages/EmailVerification'),
        beforeEnter: guest
    },
    {
        path: '/',
        component: () => import('@/components/pages/Home'),
        beforeEnter: auth,
        children: [
            {
                path: '/',
                component: () => import('@/components/pages/MainPage'),
            },
            {
                path: '/bildirimler',
                component: () => import('@/components/pages/Notification'),
            },
            {
                path: '/mentor-basvuru',
                component: () => import('@/components/pages/ApplyMentor'),
            },
            {
                path: '/mentor-programlari',
                component: () => import('@/components/pages/MentorPrograms'),
            },
        ]
    },
]

const router = new VueRouter({
    mode: 'history',
    routes
})

// Set State from Local Storage
router.beforeEach((to, from, next) => {
    store.commit('setState');
    if (checkAuth()) {
        store.dispatch('getMeInfo')
            .then(() => {
                next();
            });
        return 0;   //Kullanıcı bilgilerini almadan next() çalışmasın diye
    }
    next();
})

export default router
