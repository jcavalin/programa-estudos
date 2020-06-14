import Vue from 'vue'
import VueRouter from 'vue-router'

import Home from './pages/Home.vue'
import InsertProgramaEstudos from "./pages/programa-estudos/Insert";
import UpdateProgramaEstudos from "./pages/programa-estudos/Update";

Vue.use(VueRouter)

export default new VueRouter({
    routes: [
        {path: '/', component: Home},
        {path: '/programa-estudos/create', component: InsertProgramaEstudos},
        {path: '/programa-estudos/:id/edit', component: UpdateProgramaEstudos},
    ]
})