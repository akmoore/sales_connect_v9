import {serveToken, getToken, storeUser, getUser as retrieveUser} from './_ls'

export default {
    state: {
        user: {}
    },
    actions:{
        //User
        getUser({commit}){
            return new Promise((resolve, reject) => {
                axios.post(`/api/auth/me`, {}, serveToken()).then(response => {
                    console.log(response)
                    const roles = response.data.roles.map((role) => role.name);
                    const user = {name: response.data.contact.full_name, roles}
                    console.log(JSON.stringify(user, null, 2));
                    storeUser(user)
                    commit('setUser')
                }).catch(err => reject(err.response))
            })
        },
        getAes({commit}){
            return new Promise((resolve, reject) => {
                axios.get(`/api/aes`, serveToken()).then(response => {
                    console.log(response)
                }).catch(err => reject(err.response))
            })
        },
        //Business
        createBusiness({commit}, business){
            return new Promise((resolve, reject) => {
                axios.post(`/api/businesses`, business, serveToken()).then(response => {
                    console.log(response)
                    resolve(response)
                })
            }).catch(err => reject(err.response))
            
        }
    },
    mutations:{
        setUser(state){
            state.user = retrieveUser()
        }
    }
}