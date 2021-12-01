<template>
    <table class="w-full h-full bg-white rounded-md table-auto min-w-lg">
        <thead>
        <tr class="font-light rounded-t-md border-b text-blueGray-800">
            <th class="py-2 border-r">名稱</th>
            <th class="py-2 border-r">摘要</th>
            <th class="py-2">動作</th>
        </tr>
        </thead>
        <transition name="fade">
            <tbody v-show="isShow">
            <tr v-for="product in products" class="h-14 border-b group hover:bg-blueGray-200">
                <td class="px-2 h-14 text-center min-w-32 group-hover:text-indigo-500">
                    {{ product.name }}
                </td>

                <td class="px-2 h-14 text-center min-w-32 group-hover:text-indigo-500">
                    {{ product.excerpt }}
                </td>

                <td class="flex justify-around px-2 h-14 min-w-32">
                    <button @click="editProduct(product.id)" class="hover:text-indigo-500" title="編輯作品">
                        <i class="far fa-edit"></i>
                    </button>

                    <button @click="deleteProduct(product.id)" class="hover:text-indigo-500" title="刪除作品">
                        <i class="far fa-trash-alt"></i>
                    </button>
                </td>
            </tr>
            </tbody>
        </transition>
    </table>
</template>

<script>
import moment from "moment";
import {useRouter} from "vue-router";
import {toRefs} from "vue";
import {useStore} from "vuex";
import {apiDeleteProduct} from "../../api/product";

export default {
    props: {
        products: {
            type: Object
        },
        refreshProducts: {
            type: Function
        },
        isShow: {
            type: Boolean
        }
    },
    setup(props) {
        const {refreshProducts} = toRefs(props)

        const router = useRouter();

        function editProduct(id) {
            router.push({name: 'productsEdit', params: {id: id}});
        }

        const store = useStore();
        const deleteProduct = async (id) => {
            await Promise.all([apiDeleteProduct(id)])
                .then(() => {
                    store.dispatch('addNotice', {message: '作品刪除成功!', color: true});
                    refreshProducts.value();
                });
        }

        function date(create_at) {
            return moment(create_at).format('YYYY-MM-DD');
        }

        return {
            editProduct,
            deleteProduct,
            date,
        }
    }
}
</script>
