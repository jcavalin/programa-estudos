import Vue from 'vue'
import VueRouter from 'vue-router'

import Home from './pages/Home.vue'
import InsertProgramaEstudos from "./pages/programa-estudos/Insert"
import UpdateProgramaEstudos from "./pages/programa-estudos/Update"
import ViewProgramaEstudos from "./pages/programa-estudos/View"

Vue.use(VueRouter)

export default new VueRouter({
    routes: [
        {path: '/', component: Home},
        {path: '/programa-estudos/create', component: InsertProgramaEstudos},
        {path: '/programa-estudos/:id/edit', component: UpdateProgramaEstudos},
        {path: '/programa-estudos/:id/view', component: ViewProgramaEstudos},
    ]
})