import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const checkAuth = () => {
    return true;
};

const routes = [
    {
        path: '/',
        component: () => {
            if (checkAuth) {
                import('@/components/others/HomePage')
                return 0;
            }
            console.log('ok2');
        },
    },
    {
        path: '/giris',
        name: 'Login',
        component: () => import('@/components/authPages/Login')
    },
    {
        path: '/kayit',
        name: 'Register',
        component: () => import('@/components/authPages/Register')
    },
    /*
    * {
        path: '/',
        name: '',
        children: []
    }*/
]

const router = new VueRouter({
    mode: 'history',
    routes
})

export default router
