export default {
    state () {
        return {
            notice:[],
        }
    },
    mutations: {
        addNotice (state,data) {
            state.notice.push(data);
        },
        removeNotice(state) {
            state.notice.shift();
      }
    },
    actions:{
        addNotice (context,data) {
            context.commit('addNotice',data);

            setTimeout(()=>{
                context.commit('removeNotice');
            }, 2000);
        }
    }
}


