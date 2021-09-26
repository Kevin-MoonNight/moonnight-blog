import req from "./https";

export const apiGetTags = () => req('get','/tags');
