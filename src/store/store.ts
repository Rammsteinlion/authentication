import { createApp } from "vue";
import { createStore } from "vuex";


const store = createStore({

    state(){
        const token = localStorage.getItem('token');
        return{
            token: token,
            is_authenticated: !!token,
            sesionExp: false,
        };
    },
    mutations:{

    },
    actions:{
        login(context, token: string): void {
            localStorage.setItem('token', token)
            context.state.token = token
            context.state.is_authenticated = false
        },
        logout(context){
            localStorage.removeItem('token');
            context.state.token = null;
            context.state.is_authenticated = false;
        }
    },
    getters:{

    }
});


export default store