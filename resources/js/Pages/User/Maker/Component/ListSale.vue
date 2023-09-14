<template>
    <Head title="Danh sách sản phẩm sale" />
    <div id="list-product-sale">
        <div class="sm:px-[12px] py-[12px]">
        </div>
    </div>
</template>
<script>
import { Head, Link, useForm } from '@inertiajs/vue3';
import Paginate from '@/Components/Pagination/Paginate.vue';

export default {
    components: {
        Head,
        Link,
    },
    async created() {
    },
    data: function () {
        return {
            items: [
                {
                    id: 1,
                    product_name: "Sản phẩm đến từ tương lai 1",
                    price: "8.490.000₫",
                    percent_sale: 10
                },
                {
                    id: 2,
                    product_name: "Sản phẩm đến từ tương lai 2",
                    price: "8.490.000₫",
                    percent_sale: 10
                },
                {
                    id: 3,
                    product_name: "Sản phẩm đến từ tương lai 3",
                    price: "8.490.000₫",
                    percent_sale: 10
                }
            ]
        }
    },
    methods: {
        changeOrder(event) {
            let oldIndex = event.oldIndex
            let newIndex = event.newIndex
            let oldItem = this.items.splice(oldIndex, 1)[0];
            this.items.splice(newIndex, 0, oldItem);
        }
    }
}
</script>