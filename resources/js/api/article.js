import req from './https';

export const apiGetArticles = (data) => req('get', '/articles', data);
export const apiGetArticle = (slug) => req('get', '/articles/' + slug);
export const apiCreateArticle = (data) => req('post', '/articles/', data);
export const apiUpdateArticle = (slug, data) => req('post', '/articles/' + slug, data);
export const apiDeleteArticle = (slug) => req('delete', '/articles/' + slug);
export const apiArticles = (url) => req('get', url);
export const apiPopularArticles = () => req('get', '/articles/popular');
