import api from './api';

export default {
    list: () => api.get('banca'),
}