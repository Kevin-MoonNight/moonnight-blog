import req from './https';

export const apiLogin = (data) => req('post', '/login', data);
export const apiLogout = () => req('post', '/logout');
