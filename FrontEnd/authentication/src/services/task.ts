import { http } from "@/util";
import axios from "axios";

export const getTaskService = async () => {
  return new Promise((resolve, reject) => {
    setTimeout(async () => {
      try {
        const response = await http.get("");
      } catch (error) {
        console.error("Error:", error);
      }
    }, 2000);
  });
};

export const onGetDataTask = async (): Promise<any> => {
  try {
    const response = await http.post(
      "portafolio/authentication/Backend/public/task/",
      {},
      {
        headers: {
          "Content-Type": "application/json",
        },
      }
    );
    return response.data;
  } catch (error) {
    console.error("Error:", error);
    throw error;
  }
};

export const onAddSaveTask = async (data: { [key: string]: string }): Promise<any> => {
    try {
      const response = await http.post(
        "/portafolio/authentication/Backend/public/task/", // Reemplaza esto con la URL de tu servicio
        data, // Envía el objeto recibido directamente como datos en la solicitud
        {
          headers: {
            "Content-Type": "application/json",
          },
        }
      );
      return response.data; // O lo que necesites devolver
    } catch (error) {
      console.error("Error:", error);
      throw error;
    }
  };