import req from './https';

export const apiGetArticles = (data) => req('get', '/articles', data);
export const apiShowArticle = (slug) => req('get', '/articles/' + slug);
//需要登入驗證並且符合條件
export const apiGetArticle = (slug) => req('get', '/articles/getArticle/' + slug);
export const apiCreateArticle = (data) => req('post', '/articles', data);
export const apiUpdateArticle = (slug, data) => req('post', '/articles/' + slug, data);
export const apiDeleteArticle = (slug) => req('delete', '/articles/' + slug);
export const apiPopularArticles = () => req('get', '/articles/popular');
export const apiGetDraftArticles = (data) => req('get', '/articles/draft', data);
export const apiGetTrashedArticles = (data) => req('get', '/articles/trashed', data);
export const apiRestoreArticle = (slug) => req('get', '/articles/restore/' + slug);
export const apiDeleteTrashedArticle = (slug) => req('delete', '/articles/trashed/' + slug);
