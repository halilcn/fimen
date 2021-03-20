import {createRouter, createWebHashHistory} from 'vue-router'
//import store from '@/store/index';

const checkAuth = () => {
    return true;
};

const routes = [
    {
        path: '/',
        component: () => {
            if (checkAuth) {
                console.log('ok');
                import('@/components/others/HomePage')
                return 0;
            }
            console.log('ok2');
        },
    },
    {
        path: '/giris',
        name: 'Login',
        component: () => import('@/components/AuthPages/Login')
    },
    {
        path: '/kayit',
        name: 'Register',
        component: () => import('@/components/AuthPages/Register')
    },
    /*
    * {
        path: '/',
        name: '',
        children: []
    }*/
]

const router = createRouter({
    history: createWebHashHistory(),
    routes
})

export default router
