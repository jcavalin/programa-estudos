import Vue from 'vue'
import VueRouter from 'vue-router'

import Home from './pages/Home.vue'
import InsertProgramaEstudos from "./pages/programa-estudos/Insert";

Vue.use(VueRouter)

export default new VueRouter({
    routes: [
        {path: '/', component: Home},
        {path: '/programa-estudos/create', component: InsertProgramaEstudos},
    ]
})