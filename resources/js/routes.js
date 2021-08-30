import Vue from 'vue';
import Router from 'vue-router';

// 引用頁面的 Component
import Home from './components/pages/home.vue';
import ArticleList from './components/pages/article/index.vue';
import Contact from './components/pages/contact.vue';
import Article from './components/pages/article/show.vue';
import Articles from './components/pages/article/articles.vue';
// 使用 Vue Router
Vue.use(Router);

// 建立 Vue Router instance
export const router = new Router({
    mode: 'history',
    routes:[
        {
            path: '/',
            component: Home,
            name:'home'
        },
        {
            path: '/articles',
            component: ArticleList,
            name:'articleList'
        },
        {
            path: '/articles/:id',
            component: Article,
            name:'article'
        },
        {
            path: '/articles/tag/:name',
            component: Articles,
            name:'articleTag'
        },
        {
            path: '/product',
            component: ArticleList,
            name:'product'
        },
        {
            path: '/contact',
            component: Contact,
            name:'contact'
        },
        //其他路徑都會引導到首頁
        {
            path: '*',
            redirect: '/'
        }
    ]
});


