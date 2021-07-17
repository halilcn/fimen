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
    //Redirect
    {
        path: '/ayarlar',
        redirect: {
            name: 'NotificationsSettings'
        }
    },
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
                name: 'HomePage',
                path: '/',
                component: () => import('@/components/pages/MainPage'),
            },
            {
                path: '/bildirimler',
                component: () => import('@/components/pages/notifications/Home'),
            },
            {
                path: '/mentor-basvuru',
                name: 'ApplyMentor',
                component: () => import('@/components/pages/ApplyMentor'),
            },
            {
                name: 'MentorPrograms',
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
                path: '/aktif-programlarim',
                name: 'MeActivePrograms',
                component: () => import('@/components/pages/myActivePrograms/Home'),
                children: [
                    {
                        path: '/',
                        name: 'MeActivePrograms',
                        component: () => import('@/components/pages/myActivePrograms/Programs'),
                    },
                    {
                        path: ':id',
                        name: 'MeActiveProgramDetail',
                        component: () => import('@/components/pages/myActivePrograms/ProgramDetail'),
                        children: [
                            {
                                path: '/',
                                name: 'MeActiveProgramDetailMain',
                                component: () => import('@/components/pages/myActivePrograms/shared/MainComponent'),
                            },
                            {
                                path: 'takvim',
                                name: 'MeActiveProgramDetailCalendar',
                                component: () => import('@/components/pages/myActivePrograms/shared/calendarFile/CalendarComponent'),
                            },
                            {
                                path: 'mesaj',
                                name: 'MeActiveProgramDetailChat',
                                component: () => import('@/components/pages/myActivePrograms/shared/ChatComponent'),
                            },
                            {
                                path: 'diger',
                                name: 'MeActiveProgramDetailOthers',
                                component: () => import('@/components/pages/myActivePrograms/shared/OthersComponent'),
                            }
                        ]
                    }
                ]
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
            },
            {
                path: '/ayarlar',
                name: 'Settings',
                component: () => import('@/components/pages/settings/Home'),
                children: [
                    {
                        path: 'bildirimler',
                        name: 'NotificationsSettings',
                        component: () => import('@/components/pages/settings/NotificationsSettings'),
                    },
                ]
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
