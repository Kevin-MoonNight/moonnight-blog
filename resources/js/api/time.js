import moment from "moment";

export const date = (date) => {
    return moment(date).format('YYYY-MM-DD');
}

export const fromNow = (date) => {
    return moment(date).fromNow();
}
