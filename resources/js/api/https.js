import axios from "axios";

const instance = axios.create({
    baseURL: '/api/',
    headers: {
        'Content-Type': 'application/json'
    }
});

export const addToken = (token) => {
    instance.defaults.headers.common['Authorization'] = `Bearer ${token}`;
}

export const deleteToken = () => {
    delete instance.defaults.headers.common["Authorization"];
}

instance.interceptors.request.use((config) => {
    return config;
}, (error) => {
    return Promise.reject(error);
})

instance.interceptors.response.use((response) => {
    return response;
}, (error) => {
    const {response} = error;
    if (response) {
        errorHandle(response.status, response.data);
        return Promise.reject(error);
    } else {
        if (!window.navigator.onLine) {
            tip('網路出了點問題，請重新連接後刷新網頁');
        } else {
            return Promise.reject(error);
        }
    }
})


import {tip, toLogin} from "./utils";
import {store} from "../store";

const errorHandle = (status, message) => {
    switch (status) {
        case 400:
            Object.values(message).forEach((value) => {
                value.forEach((error) => {
                    tip(error);
                })
            })
            break;
        case 401:
            tip('登入過期，請重新登入')

            setTimeout(() => {
                toLogin();
            }, 1000)
            break;
        case 403:
            tip('用戶端並無訪問權限')
            break;
        case 404:
            tip('伺服器找不到請求的資源');
            break;
        default:
            tip('resp沒有攔截到的錯誤:');
            console.log(message);
    }
}

export default function (method, url, data = null) {
    method = method.toLowerCase();
    instance.defaults.headers.common["Content-Type"] = 'application/json';
    const isAuthenticated = store.state.auth.isAuth;

    //防止網頁重整axios的token不見
    if (isAuthenticated) {
        addToken(store.state.auth.token);
    }

    switch (method) {
        case 'get':
            return instance.get(url, {params: data});
        case 'post':
            instance.defaults.headers.common["Content-Type"] = 'multipart/form-data';
            return instance.post(url, data);
        case 'put':
            return instance.put(url, data);
        case 'delete':
            return instance.delete(url, {params: data});
        default:
            console.log('未知的method' + method);
            return false;
    }
}


