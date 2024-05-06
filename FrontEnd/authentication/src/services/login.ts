import axios from 'axios';
import { http } from '@/util/http'



export const loginService = {
  login: async (username: string, password: string) => {
    try {
      const response = await http.post('/portafolio/Session/authentication/Backend/login', {
        username: username,
        password: password
      }, {
        headers: {
          'Content-Type': 'application/json',
        }
      });
      
      // Aquí puedes manejar la respuesta del servidor
      console.log(response.data); // Esto imprimirá los datos de respuesta en la consola
      
      return response.data; // Puedes devolver los datos si es necesario
    } catch (error) {
      // Aquí puedes manejar errores, como credenciales incorrectas o problemas de red
      console.error('Error al iniciar sesión:', error);
      throw error; // Puedes lanzar el error para que sea manejado por código externo si es necesario
    }
  }
};
