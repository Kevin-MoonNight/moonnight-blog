import {router} from "../routes";

export const tip = (message) => {

}

export const toLogin = () => {
    router.replace({
        name:'Login',
        query:{
            redirect:router.currentRoute.fullPath
        }
    })
}

export const to403Page = () => {
    router.replace({
        name:'Home'
    })
}
