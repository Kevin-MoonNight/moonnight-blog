import {store} from "../store";


export const tip = (message) => {
    store.dispatch('addNotice', {message: message, color: false});
}

export const onCopy = () => {
    store.dispatch('addNotice', {message: '複製成功!', color: true});
}

