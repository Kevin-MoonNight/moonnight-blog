import req from "./https";

export const apiGetTags = (data) => req('get', '/tags', data);
export const apiGetTag = (slug) => req('get', '/tags/' + slug);
export const apiCreateTag = (data) => req('post', '/tags', data);
export const apiUpdateTag = (slug, data) => req('put', '/tags/' + slug, data);
export const apiDeleteTag = (slug) => req('delete', '/tags/' + slug);
