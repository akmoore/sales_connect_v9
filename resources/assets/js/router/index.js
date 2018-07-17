//Import the frameworks
import Vue from 'vue'
import VueRouter from 'vue-router'

//Import the routes
import DashboardRoutes from './route_dashboard'
import AuthRoutes from './route_auth'

//Hook-up vue-router to Vue framework
Vue.use(VueRouter)

//Routes
const routes = [
    ...DashboardRoutes,
    ...AuthRoutes
];

//Export Router
export default new VueRouter({
  routes,
//   mode: 'history',
});

