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
            context.commit('login', data);
            addToken(data.token);
        },
        logout(context) {
            context.commit('logout');
            deleteToken();
        }
    }
}


