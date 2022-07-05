require('./bootstrap');

import { createApp } from 'vue';
import * as VueRouter from 'vue-router';

import EmployeeIndex from './components/employees/Index.vue';
import EmployeeCreate from './components/employees/Create.vue';
import EmployeeEdit from './components/employees/Edit.vue'
import Datepicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css'

let app = createApp({})

app.component('employee-index', EmployeeIndex);
app.component('Datepicker', Datepicker);

const routes = [
    { path: '/', name: "EmployeesIndex", component: EmployeeIndex },
    { path: '/create', name: "EmployeesCreate", component: EmployeeCreate },
    { path: '/edi/:id', name: "EmployeesEdit", component: EmployeeEdit },
]
  
const router = VueRouter.createRouter({
    history: VueRouter.createWebHashHistory(),
    routes, 
})

app.use(router)

app.mount("#app") 