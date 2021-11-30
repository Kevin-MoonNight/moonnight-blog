<template>
    <div class="w-full h-auto bg-white rounded-sm shadow-md">
        <div class="p-5">
            <div class="w-full">
                <label htmlFor="name"
                       class="block mb-2 ml-1 font-bold text-left uppercase text-md text-blueGray-600">
                    名稱
                </label>
                <input v-model="tag.name" id="name" type="text" name="name" placeholder="名稱"
                       class="input-style">
            </div>
            <div class="mt-4 w-full">
                <label htmlFor="slug"
                       class="block mb-2 ml-1 font-bold text-left uppercase text-md text-blueGray-600">
                    slug
                </label>
                <input v-model="tag.slug" id="slug" type="text" name="slug" placeholder="slug"
                       class="input-style">
            </div>

            <div class="flex justify-end mt-4 w-full">
                <button @click="createTag"
                        class="px-6 py-3 mr-1 mb-1 font-medium text-left text-white uppercase rounded shadow transition-all duration-150 ease-linear outline-none text-md bg-blueGray-800 active:bg-blueGray-600 hover:shadow-lg focus:outline-none">
                    新增標籤
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import {ref} from "vue";
import {useRouter} from "vue-router";
import {apiCreateTag} from "../../api/tag";
import {useStore} from "vuex";

export default {
    setup() {
        const tag = ref({
            name: '',
            slug: ''
        });

        const router = useRouter();
        const store = useStore();
        const createTag = async () => {
            await Promise.all([apiCreateTag(tag.value)])
                .then(() => {
                    store.dispatch('addNotice', {message: '標籤新增成功!', color: true});
                    router.push({name: 'tagsManage'});
                });
        };

        return {
            tag,
            createTag
        }
    }
}
</script>
