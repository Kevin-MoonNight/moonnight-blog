import Home from './views/frontend/Home';
import Articles from './views/frontend/Articles';
import Article from './views/frontend/Article';
import Products from './views/frontend/Products';
import Login from './views/auth/Login';
import Register from './views/auth/Register';
import Dashboard from './views/backend/Dashboard';
import ArticlesManager from './views/backend/Articles';
import ArticlesEdit from './views/articles/Edit';
import ArticlesCreate from './views/articles/Create';
import Messages from './views/backend/Messages';
import Backend from "./views/layouts/Backend";
import Frontend from "./views/layouts/Frontend";
import {createRouter, createWebHistory} from 'vue-router';
import {store} from './store/index';
import {apiLogout} from "./api/auth";
import ArticlesLayout from "./views/layouts/ArticlesLayout";
import {toLogin} from "./api/utils";

const routes = [
    {
        path: '/',
        component: Frontend,
        meta: {
            requiresAuth: false
        },
        children: [
            {
                path: '',
                component: Home,
                name: 'home'
            },
            {
                path: 'articles',
                component: ArticlesLayout,
                meta: {
                    requiresAuth: false
                },
                children: [
                    {
                        path: '',
                        component: Articles,
                        name: 'articles',
                        query: {
                            search: null,
                            tag: null,
                            page: null
                        }
                    },
                    {
                        path: ':slug',
                        component: Article,
                        name: 'article',
                    }
                ]
            },
            {
                path: 'products',
                component: Products,
                name: 'products'
            },
        ]
    },
    {
        path: '/dashboard',
        component: Backend,
        meta: {
            requiresAuth: true
        },
        children: [
            {
                path: '',
                component: Dashboard,
                name: 'dashboard',
            },
            {
                path: 'articles',
                component: ArticlesManager,
                name: 'articlesManager',
            },
            {
                path: 'articles/create',
                component: ArticlesCreate,
                name: 'articlesCreate',
            },
            {
                path: 'articles/:id/edit',
                component: ArticlesEdit,
                name: 'articlesEdit',
            },
            {
                path: 'messages',
                component: Messages,
                name: 'messagesManager',
            },
        ]
    },
    {
        path: '/login',
        component: Login,
        name: 'login'
    },
    {
        path: '/logout',
        name: 'logout',
        beforeEnter: [logout]
    },
    {
        path: '/register',
        component: Register,
        name: 'register'
    },
]

async function logout() {
    await Promise.all([apiLogout()])
        .then((results) => {
            store.dispatch('logout');
            router.push({name: 'home'});
        });
}

const scrollBehavior = function (to, from, savedPosition) {
    if (to.hash) {
        const options = {
            top: document.querySelector(to.hash).offsetTop,
            behavior: 'smooth'
        };
        window.scrollTo(options);
    } else {
        const options = {
            top: 0
            // behavior: 'smooth'
        };
        window.scrollTo(options);
    }
}

export const router = createRouter({
    history: createWebHistory(),
    routes: routes,
    scrollBehavior
});

router.beforeEach((to, from, next) => {
    const isAuthenticated = store.state.auth.isAuth;
    if (!isAuthenticated && to.meta.requiresAuth) next('Login')
    else next();
})
