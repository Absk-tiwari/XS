import axios from 'axios';

const api = axios.create({
    baseURL: process.env.NEXT_PUBLIC_API_URL,
    withCredentials: true, // Required for Sanctum CSRF handling
    headers: {
      "Accept": "application/json",
      "Content-Type": "application/json",
    },
});

export const getCsrfToken = async () => {
    await api.get("/sanctum/csrf-cookie");
};
  
export default api;