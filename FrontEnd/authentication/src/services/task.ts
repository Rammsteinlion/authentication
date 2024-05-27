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


  export const getDataTask = async (): Promise<any> => {
    try {
        const response = await http.get('http://localhost/portafolio/Session/authentication/Backend/public/user/', {
            headers: {
                // No se requiere x-token para esta solicitud
            }
        });
        return response.data;
    } catch (error) {
        console.error('Error:', error);
        throw error; // Propaga el error para que el llamador pueda manejarlo
    }
};