import {router} from "../routes";
import {store} from "../store";

export const tip = (message) => {
    store.dispatch('addNotice', {message: message, color: false});
}

export const toLogin = () => {
    router.replace({
        name: 'Login',
        query: {
            redirect: router.currentRoute.fullPath
        }
    })
}

export const login = (data) => {
    store.dispatch('login', data);
}
export const logout = () => {
    store.dispatch('logout');
}

export const onCopy = () => {
    store.dispatch('addNotice', {message: '複製成功!', color: true});
}
