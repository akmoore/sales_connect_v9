import {storeToken} from './_ls'

export default {
    state:{
        name: 'Auth - State'
    },
    actions:{
        login({commit}, credentials){
            return new Promise((resolve, reject) => {
                axios.post(`/api/auth/login`, credentials).then(response => {
                    storeToken(response.data.access_token)
                    resolve(response)
                }).catch(err => reject(err.response))
            })
        }
    }
}