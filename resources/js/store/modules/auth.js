import {addToken, deleteToken} from "../../api/https";

export default {
    state() {
        return {
            isAuth: false,
            token: null,
            user: null
        }
    },
    mutations: {
        login(state, data) {
            state.isAuth = true;
            state.token = data.token;
            state.user = data.user;
        },
        logout(state) {
            state.isAuth = false;
            state.token = null;
        }
    },
    actions: {
        login(context, data) {
            addToken(data.token)
            context.commit('login', data);
        },
        logout(context) {
            deleteToken()
            context.commit('logout');
        }
    }
}


