import req from './https';

export const apiGetMessages = () => req('get','/messages');
export const apiGetMessage = (id) => req('get','/messages/' + id);
export const apiCreateMessage = (data) => req('post','/messages/', data);
export const apiUpdateMessage = (id,data) => req('put','/messages/' + id, data);
export const apiDeleteMessage = (id) => req('delete','/messages/' + id);
export const apiMessages = (url) => req('get',url);
