const Home = () => import('./views/frontend/Home');
const Articles = () => import('./views/frontend/Articles');
const Article = () => import('./views/articles/ArticlesShow');
const Products = () => import( './views/frontend/Products');
const Login = () => import( './views/auth/Login');
const Register = () => import( './views/auth/Register');
const Dashboard = () => import( './views/backend/Dashboard');
const ArticlesManage = () => import( './views/backend/Articles');
const ArticlesEdit = () => import( './views/articles/ArticlesEdit');
const ArticlesCreate = () => import( './views/articles/ArticlesCreate');
const MessagesManage = () => import( './views/backend/Messages');
const MessagesEdit = () => import( "./views/messages/MessagesEdit");
const Backend = () => import( "./views/layouts/Backend");
const Frontend = () => import( "./views/layouts/Frontend");
const ArticlesLayout = () => import( "./views/layouts/ArticlesLayout");
const ArticlesTrashed = () => import( "./views/articles/ArticlesTrashed");
const ArticlesDraft = () => import( "./views/articles/ArticlesDraft");
const UsersManage = () => import( "./views/backend/Users");
const UsersEdit = () => import( "./views/users/UsersEdit");
const UsersEditPassword = () => import( "./views/users/UsersEditPassword");
const Setting = () => import( "./views/backend/Setting");
const TagsManage = () => import('./views/backend/Tags');
const TagsCreate = () => import('./views/tags/TagsCreate')
const TagsEdit = () => import('./views/tags/TagsEdit')
const PathNotFound = () => import('./views/components/PathNotFound');
const ProductsManage = () => import('./views/backend/Products');
const ProductsCreate = () => import('./views/products/ProductsCreate');
const ProductsEdit = () => import('./views/products/ProductsEdit');

import {store} from './store/index';
import {logout} from "./api/utils";
import {createRouter, createWebHistory} from 'vue-router';

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
            {
                path: '/:pathMatch(.*)*',
                component: PathNotFound
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
                path: 'tags',
                component: TagsManage,
                name: 'tagsManage',
                query: {
                    search: null
                }
            },
            {
                path: 'tags/create',
                component: TagsCreate,
                name: 'tagsCreate',
            },
            {
                path: 'tags/:slug/edit',
                component: TagsEdit,
                name: 'tagsEdit',
            },
            {
                path: 'products',
                component: ProductsManage,
                name: 'productsManage',
                query: {
                    page: null
                }
            },
            {
                path: 'products/create',
                component: ProductsCreate,
                name: 'productsCreate',
            },
            {
                path: 'products/:id/edit',
                component: ProductsEdit,
                name: 'productsEdit',
            },
            {
                path: 'messages',
                component: MessagesManage,
                name: 'messagesManage',
                query: {
                    search: null,
                    page: null
                }
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
                query: {
                    search: null,
                    page: null
                }
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

    if (!isAuthenticated && to.meta.requiresAuth) next('Login')
    else next();
})
