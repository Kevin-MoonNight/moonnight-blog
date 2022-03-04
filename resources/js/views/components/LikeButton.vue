<template>
    <div @click="like()"
         class="flex items-center cursor-pointer select-none transition delay-200 duration-300 ease-in-out"
         :class="isLiked ? 'text-red-400 hover:text-gray-700' : 'text-gray-700 hover:text-red-400'"
         :title="isLiked ? 'Unlike' : 'Like'"
    >
        <i class="fas fa-heart"></i>
        <small class="ml-1">{{ count }}</small>
    </div>
</template>
<script>
import {ref} from "vue";
import {apiLike, apiUnlike} from "../../api/like";
import {Mutex} from 'async-mutex';

export default {
    props: {
        likeCount: {
            required: true
        },
        liked: {
            required: true
        },
        articleId: {
            type:String,
            required: true
        },
    },
    setup(props) {
        const isLiked = ref(props.liked === 'true');
        const count = ref(props.likeCount);
        const mutex = new Mutex();

        const like = async () => {
            isLiked.value = !isLiked.value;
            if (isLiked.value) {
                count.value++;

                await mutex.runExclusive(async () => {
                    await apiLike({
                        'article_id': props.articleId
                    });
                });
            } else {
                count.value--;

                await mutex.runExclusive(async () => {
                    await apiUnlike(props.articleId);
                });
            }
        }

        return {
            isLiked,
            count,
            like
        }
    }
}
</script>
