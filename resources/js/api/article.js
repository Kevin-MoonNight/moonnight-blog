import req from './https';

export const apiGetArticles = (data) => req('get','/articles',data);
export const apiGetArticle = (id) => req('get','/articles/' + id);
export const apiCreateArticle = (data) => req('post','/articles/', data);
export const apiUpdateArticle = (id,data) => req('post','/articles/' + id, data);
export const apiDeleteArticle = (id) => req('delete','/articles/' + id);
export const apiArticles = (url) => req('get',url);
export const apiPopularArticles = () => req('get','/articles/popular');
