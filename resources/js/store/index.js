import { createStore } from 'vuex'
import createPersistedState from 'vuex-persistedstate';
import SecureLS from "secure-ls";
let ls = new SecureLS({ isCompression: false });
import auth from './modules/auth';
import notice from "./modules/notice";

const dataState = createPersistedState({
    key:'auth',
    paths:['auth'],
    storage: {
        getItem: (key) => ls.get(key),
        setItem: (key, value) => ls.set(key, value),
        removeItem: (key) => ls.remove(key),
    },
})

export const store = createStore({
    modules:{
        auth,
        notice
    },
    plugins: [dataState]
})





