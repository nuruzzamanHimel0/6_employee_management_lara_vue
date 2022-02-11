import compEmplyIndex from './components/employees/index.vue'
import compEmplyCreate from './components/employees/create.vue'
import compEmplyEdit from './components/employees/edit.vue'

export  const routes = [
    {
        path: '/employees',
        component: compEmplyIndex,
        name:'compEmplyIndex'
    },
    {
        path: '/employees/create',
        component: compEmplyCreate,
        name:'compEmplyCreate'
    },
    {
        path: '/employees/edit/:edit',
        component: compEmplyEdit,
        name:'compEmplyEdit'
    },
    // { path: '/about', component: About },
  ]
