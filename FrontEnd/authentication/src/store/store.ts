import { createApp } from "vue";
import { createStore } from 'vuex'

const store = createStore({

    state(){
        return{
            token: localStorage.getItem('token'),
            is_authenticated: !localStorage.getItem('token'),
            sesionExp: false,
        };
    },
    mutations:{

    },
    actions:{
        login(context, token: string): void {
            localStorage.setItem('token', token)
            context.state.token = token
            context.state.is_authenticated = true
        },
    },
    getters:{

    }
});


export default store