import { http } from "@/util";

export const getTaskService = async () => {
    return new Promise((resolve, reject) =>{
        setTimeout(async() =>{
            try {
                const response = await http.get('');
            } catch (error) {
                console.error('Error:', error);
            }
        }, 2000);
    })
  };