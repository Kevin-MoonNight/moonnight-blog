import Home from './views/frontend/Home';
import Articles from './views/frontend/Articles';
import Article from './views/articles/ArticlesShow';
import Products from './views/frontend/Products';
import Login from './views/auth/Login';
import Register from './views/auth/Register';
import Dashboard from './views/backend/Dashboard';
import ArticlesManage from './views/backend/Articles';
import ArticlesEdit from './views/articles/ArticlesEdit';
import ArticlesCreate from './views/articles/ArticlesCreate';
import MessagesManage from './views/backend/Messages';
import MessagesEdit from "./views/messages/MessagesEdit";
import Backend from "./views/layouts/Backend";
import Frontend from "./views/layouts/Frontend";
import ArticlesLayout from "./views/layouts/ArticlesLayout";
import ArticlesTrashed from "./views/articles/ArticlesTrashed";
import {store} from './store/index';
import {logout} from "./api/utils";
import {addToken} from "./api/https";
import {createRouter, createWebHistory} from 'vue-router';
import ArticlesDraft from "./views/articles/ArticlesDraft";
import UsersManage from "./views/backend/Users";
import UsersEdit from "./views/users/UsersEdit";
import UsersEditPassword from "./views/users/UsersEditPassword";
import Setting from "./views/backend/Setting";

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
                component: ArticlesManage,
                name: 'articlesManage',
                query: {
                    search: null,
                    tag: null,
                    page: null
                }
            },
            {
                path: 'articles/draft',
                component: ArticlesDraft,
                name: 'articlesDraft',
                query: {
                    search: null,
                    tag: null,
                    page: null
                }
            },
            {
                path: 'articles/trashed',
                component: ArticlesTrashed,
                name: 'articlesTrashed',
                query: {
                    search: null,
                    tag: null,
                    page: null
                }
            },
            {
                path: 'articles/create',
                component: ArticlesCreate,
                name: 'articlesCreate',
            },
            {
                path: 'articles/:slug/edit',
                component: ArticlesEdit,
                name: 'articlesEdit',
            },
            {
                path: 'messages',
                component: MessagesManage,
                name: 'messagesManage',
            },
            {
                path: 'messages/:id/edit',
                component: MessagesEdit,
                name: 'messagesEdit',
            },
            {
                path: 'users',
                component: UsersManage,
                name: 'usersManage',
            },
            {
                path: 'users/:id/edit',
                component: UsersEdit,
                name: 'usersEdit',
            },
            {
                path: 'users/:id/password/edit',
                component: UsersEditPassword,
                name: 'usersEditPassword',
            },
            {
                path: 'setting',
                component: Setting,
                name: 'setting',
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
