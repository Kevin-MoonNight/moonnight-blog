export default {
    state() {
        return {
            notices: []
        }
    },
    mutations: {
        addNotice(state, data) {
            state.notices.push(data);
        },
        removeNotice(state) {
            state.notices.shift();
        }
    },
    actions: {
        addNotice(context, data) {
            context.commit('addNotice', data);

            setTimeout(() => {
                context.commit('removeNotice');
            }, 3000);
        }
    }
}


