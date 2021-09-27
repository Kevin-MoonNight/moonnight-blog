import Home from './components/frontend/Home';
import Articles from './components/frontend/Articles';
import Article from './components/articles/Show';
import Products from './components/frontend/Products';
import Contact from './components/frontend/Contact';
import Login from './components/auth/Login';
import Register from './components/auth/Register';
import Dashboard from './components/backend/Dashboard';
import ArticlesManager from './components/backend/Articles';
import ArticlesEdit from './components/articles/Edit';
import ArticlesCreate from  './components/articles/Create';
import Messages from './components/backend/Messages';
import Backend from "./components/layouts/Backend";
import Frontend from "./components/layouts/Frontend";
import {createRouter,createWebHistory} from 'vue-router';
import { store } from './store/index';

const routes = [
    {
        path: '/',
        component: Frontend,
        meta:{
            requiresAuth:false
        },
        children:[
            {
                path: '',
                component: Home,
                name:'home'
            },
            {
                path: 'articles',
                component: Articles,
                name:'articles',
                query:{
                    search:null,
                    tag:null
                }
            },
            {
                path: 'articles/:id',
                component: Article,
                name:'showArticle',
            },
            {
                path: 'product',
                component: Products,
                name:'product'
            },
            {
                path: 'contact',
                component: Contact,
                name:'contact'
            },
        ]
    },
    {
        path: '/dashboard',
        component: Backend,
        meta:{
            requiresAuth:true
        },
        children:[
            {
                path: '',
                component: Dashboard,
                name:'dashboard',
            },
            {
                path: 'articles',
                component: ArticlesManager,
                name:'articlesManager',
            },
            {
                path: 'articles/create',
                component: ArticlesCreate,
                name:'articlesCreate',
            },
            {
                path: 'articles/:id/edit',
                component: ArticlesEdit,
                name:'articlesEdit',
            },
            {
                path: 'messages',
                component: Messages,
                name:'messagesManager',
            },
        ]
    },
    {
        path: '/login',
        component: Login,
        name:'login'
    },
    {
        path: '/register',
        component: Register,
        name:'register'
    },
]

export const router = createRouter({
    history: createWebHistory(),
    routes:routes,
});

router.beforeEach((to,from,next)=>{
    const isAuthenticated = store.state.auth.isAuth;
    if(!isAuthenticated && to.meta.requiresAuth) next('Login')
    else next();
})
