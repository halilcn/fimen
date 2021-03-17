import {createRouter, createWebHashHistory} from 'vue-router'

const routes = [
    {
        path: '/',
        name: 'HomePage',
        component: () => import('@/components/Others/HomePage')
    },
    {
        path: '/giris',
        name: 'Login',
        component: () => import('@/components/Others/Login')
    },
    {
        path: '/kayit',
        name: 'Register',
        component: () => import('@/components/Others/Register')
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
