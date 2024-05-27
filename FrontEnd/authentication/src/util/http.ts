import axios from "axios";
import store from "@/store/store";

const http = axios.create({
    baseURL: import.meta.env.VITE_API_URL,
    headers:{
        'Content-Type': 'application/json'
    }
});



export { http}