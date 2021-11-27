import req from './https';

export const apiGetUsers = (data) => req('get', '/users', data);
export const apiGetUser = (id) => req('get', '/users/' + id);
export const apiCreateUser = (data) => req('post', '/users', data);
export const apiUpdateUser = (id, data) => req('put', '/users/' + id, data);
export const apiDeleteUser = (id) => req('delete', '/users/' + id);
export const apiUpdateUserPassword = (id, data) => req('put', '/users/password/' + id, data);
