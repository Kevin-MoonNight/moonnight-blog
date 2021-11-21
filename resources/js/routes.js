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
import ArticlesLayout from "./views/layouts/ArticlesLayout";
import {logout} from "./api/utils";
import {addToken} from "./api/https";

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
            {
                path: '/login',
                component: Login,
                name: 'login'
            },
            {
                path: '/register',
                component: Register,
                name: 'register',
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
                name: 'managesArticle',
                query: {
                    search: null,
                    tag: null,
                    page: null
                }
            },
            {
                path: 'articles/create',
                component: ArticlesCreate,
                name: 'createArticle',
            },
            {
                path: 'articles/:slug/edit',
                component: ArticlesEdit,
                name: 'editArticle',
            },
            {
                path: 'messages',
                component: Messages,
                name: 'messagesManager',
            },
        ]
    },
    {
        path: '/logout',
        name: 'logout',
        beforeEnter: [logout],
        meta: {
            requiresAuth: true
        }
    },
]

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

    //防止網頁重整axios的token不見
    if (isAuthenticated) {
        addToken(store.state.auth.token);
    }

    if (!isAuthenticated && to.meta.requiresAuth) next('Login')
    else next();
})
