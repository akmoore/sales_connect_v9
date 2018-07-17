import Vue from 'vue'
import Vuex from 'vuex'

import AuthModule from './auth'
import DashboardModule from './dashboard'

Vue.use(Vuex)

export default new Vuex.Store({
    modules:{
        auth: AuthModule,
        dashboard: DashboardModule
    },
    state:{
        name: "Sales Connect App"
    }
})