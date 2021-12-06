<template>
    <table-layout>
        <template v-slot:header>
            <th class="py-2 border-r">名稱</th>
            <th class="py-2 border-r">摘要</th>
            <th class="py-2">動作</th>
        </template>
        <template v-slot:body>
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
        </template>
    </table-layout>
</template>

<script>
import {useRouter} from "vue-router";
import {toRefs} from "vue";
import {useStore} from "vuex";
import {apiDeleteProduct} from "../../api/product";
import {date} from "../../api/time";
import TableLayout from "../layouts/TableLayout";

export default {
    components: {TableLayout},
    props: {
        products: {
            type: Object,
            required: true
        },
        refreshProducts: {
            type: Function,
            required: true
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
            await apiDeleteProduct(id)
                .then(() => {
                    store.dispatch('addNotice', {message: '作品刪除成功!', color: true});
                    refreshProducts.value();
                });
        }

        return {
            editProduct,
            deleteProduct,
            date: date
        }
    }
}
</script>
