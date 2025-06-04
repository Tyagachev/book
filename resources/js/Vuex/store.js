import Vuex from 'vuex';
const store = new Vuex.Store({
    state: {
        user: {},
        content: ''
    },
    getters: {
        GET_USER: (state) => {
            return state.user
        }
    },
    mutations: {
        SET_USER: (state, user) => {
            state.user = {
                id: user.id,
                name: user.name,
                role: user.roles[0].role
            }
        }
    },
    actions: {
        USER: (ctx, user) => {
            ctx.commit('SET_USER', user)
        }
    },
    modules: {

    }
});

export default store;
