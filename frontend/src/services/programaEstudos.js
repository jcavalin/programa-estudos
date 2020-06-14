import api from './api';

export default {
    list: () => api.get('programas-estudos'),
    get: id => api.get(`programas-estudos/${id}`),
    assuntos: id => api.get(`programas-estudos/${id}/assuntos`),
    insert: data => api.post('programas-estudos', data),
    update: (id, data) => api.put(`programas-estudos/${id}`, data),
    delete: id => api.delete(`programas-estudos/${id}`),
}