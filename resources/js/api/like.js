import req from './https';

export const apiLike = (data) => req('post', '/likes', data);
export const apiUnlike = (articleSlug) => req('delete', '/likes/' + articleSlug);

