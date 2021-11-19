import req from './https';

export const apiGetProducts = (data) => req('get', '/products', data);
export const apiGetProduct = (id) => req('get', '/products/' + id);
export const apiCreateProduct = (data) => req('post', '/products/', data);
export const apiUpdateProduct = (id, data) => req('post', '/products/' + id, data);
export const apiDeleteProduct = (id) => req('delete', '/products/' + id);
