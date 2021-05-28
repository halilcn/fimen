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
                name: 'ApplyMentor',
                component: () => import('@/components/pages/ApplyMentor'),
            },
            {
                path: '/mentor-programlari',
                component: () => import('@/components/pages/mentorPrograms/Home'),
                children: [
                    {
                        path: '/',
                        name: 'mentorPrograms',
                        component: () => import('@/components/pages/mentorPrograms/Programs'),
                    },
                    {
                        path: ':slug',
                        name: 'MentorProgramDetail',
                        component: () => import('@/components/pages/mentorPrograms/ProgramDetail'),
                    },
                ]
            },
            {
                path: '/profil-duzenle',
                name: 'MeSettings',
                component: () => import('@/components/pages/user/MeSettings')
            },
            {
                path: '/profil/:username',
                name: 'UserProfile',
                component: () => import('@/components/pages/user/UserProfile')
            },
            {
                path: '/mentor-programlarim',
                name: 'MyMentorPrograms',
                component: () => import('@/components/pages/myMentorPrograms/Program'),
            },
            {
                path: '/mentor-programlarim/:slug',
                name: 'MyMentorProgramDetail',
                component: () => import('@/components/pages/myMentorPrograms/ProgramDetail'),
            }
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
