export const storeToken = (token) => {
    window.localStorage.setItem('token', token)
}

export const getToken = () => {
    let token = window.localStorage.getItem('token')
    if(token) return token
    return false
}

export const serveToken = () => {
    return getToken() ? {headers: {Authorization: `Bearer ${getToken()}`}} : false
}

export const storeUser = (user) => {
    window.localStorage.setItem('user', JSON.stringify(user))
}

export const getUser = () => {
    return JSON.parse(window.localStorage.getItem('user'))
}