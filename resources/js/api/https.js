import axios from "axios";

const instance = axios.create({
    baseURL: '/api/',
    headers: {
        'Content-Type': 'application/json'
    }
});

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


import {tip} from "./utils";

const errorHandle = (status, message) => {
    switch (status) {
        case 400:
            Object.values(message).forEach((value) => {
                value.forEach((error) => {
                    tip(error);
                })
            })
            console.log(message);
            break;
        case 401:
            tip('登入過期，請重新登入')
            console.log(message);
            break;
        case 403:
            tip('用戶端並無訪問權限')
            console.log(message);
            break;
        case 404:
            tip('伺服器找不到請求的資源');
            console.log(message);
            break;
        default:
            tip('resp沒有攔截到的錯誤:');
            console.log(message);
    }
}

export default function (method, url, data = null) {
    method = method.toLowerCase();

    switch (method) {
        case 'get':
            return instance.get(url, {params: data});
        case 'post':
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
