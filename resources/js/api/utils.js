import {router} from "../routes";
import {store} from "../store";
import {apiLogin, apiLogout} from "./auth";

export const tip = (message) => {
    store.dispatch('addNotice', {message: message, color: false});
}

export const toLogin = () => {
    store.dispatch('logout');
    router.replace({name: 'login'})
}

export const login = async (data) => {
    await Promise.all([apiLogin(data)])
        .then((results) => {
            store.dispatch('login', results[0].data);
            store.dispatch('addNotice', {message: '登入成功!', color: true});
            router.push({name: 'dashboard'});
        }).catch(() => {
            store.dispatch('addNotice', {message: '帳號或密碼錯誤!', color: false});
        });
}
export const logout = async () => {
    await Promise.all([apiLogout()])
        .then(() => {
            store.dispatch('logout');
            store.dispatch('addNotice', {message: '登出成功!', color: true})
            router.push({name: 'home'});
        });
}

export const onCopy = () => {
    store.dispatch('addNotice', {message: '複製成功!', color: true});
}

export const transformToFormData = (data) => {
    const result = new FormData();

    Object.keys(data).forEach((key) => {
        if (data[key] !== null) {
            if (Array.isArray(data[key])) {
                data[key].forEach((item) => {
                    result.append(`${key}[]`, item);
                });
            } else {
                result.append(key, data[key])
            }
        }
    });

    return result;
}
