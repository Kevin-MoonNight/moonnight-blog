import axios from "axios";

const instance = axios.create({
    baseURL: '/api/',
    headers:{
        contentType:'application/json'
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
},(error) => {
    return Promise.reject(error);
})

instance.interceptors.request.use((response) => {
        return response;
    },(error) => {
        const {response} = error;
        if(response){
            errorHandle(response.status,response.data.error);
            return Promise.reject(error);
        }else{
            if(!window.navigator.onLine){
                tip('網路出了點問題，請重新連接後刷新網頁');
            }else{
                return Promise.reject(error);
            }
        }
})


import {tip,toLogin ,to403Page} from "./utils";

const errorHandle = (status,message) =>{
    switch(status){
        case 400:
            tip(message);
            break;
        case 401:
            tip('登入過期，請重新登入')
            setTimeout(()=>{
                toLogin();
            },1000)
            break;
        case 403:
            to403Page();
            break;
        case 404:
            tip(message);
            break;
        default:
            console.log('resp沒有攔截到的錯誤:' + message);
    }
}

export default function(method,url,data = null){
    method = method.toLowerCase();

    switch(method){
        case 'get':
            return instance.get(url,{params:data});
            break;
        case 'post':
            return instance.post(url,data);
            break;
        case 'put':
            return instance.put(url,data);
            break;
        case 'delete':
            return instance.delete(url,{params:data});
            break;
        default:
            console.log('未知的method' + method);
            return false;
    }
}




