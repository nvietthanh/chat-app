<template>
    <Head title="Danh sách sản phẩm" />
    <div id="list-product-maker" v-loading="loading">
        <div class="flex justify-end gap-4 mt-[12px] mr-[12px]">
            <button class="w-[120px] text-center h-[32px] border border-[#6e6a6a]" @click="deleteItems">
                Xóa sản phẩm
            </button>
            <button class="w-[100px] text-center h-[32px] text-[white] bg-[#d0011b]" @click="openFormCreate">
                Thêm mới
            </button>
        </div>
        <div class="py-[12px] min-h-[50vh]">
            <div
                v-for="(item, index) in items" :key="index"
                class="sm:px-[12px] px-[4px] product-item flex items-center h-[90px] border-b-[1px]"
            >
                <el-checkbox v-model="selectItem[index]" size="large"/>
                <el-image src="/images/devices/phone/dienthoai-1.webp" class="sm:ml-[8px] ml-[4px] h-[70px] w-[70px] object-cover"/>
                <div class="sm:w-[80%] w-[90%]">
                    <div class="product-name font-bold text-[14px] cursor-pointer" @click="openFormEdit(item)">
                        {{ item.product_name }}
                    </div>
                    <div class="mt-[6px] flex items-center">
                        <div class="font-bold text-[#d0021c]">{{ item.price }}</div>
                        <div class="ml-[18px] text-white bg-[#d0021c] text-[12px] py-[2px] px-[8px]">
                            -{{ item.percent_sale }}%
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <ProductCreate ref="createProduct"/>
    </div>
</template>
<script>
import { Head, Link, useForm } from '@inertiajs/vue3';
import Paginate from '@/Components/Pagination/Paginate.vue';
import ProductCreate from './ProductComponent/Create.vue'

export default {
    components: {
        Head, ProductCreate 
    },
    data() {
        return {
            loading: false,
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
            ],
            selectItem: []
        }
    },
    created() {
        this.fetchData()
    },
    methods: {
        fetchData() {
            this.loading = false
        },
        deleteItems() {
            console.log(this.selectItem)
        },
        openFormCreate() {
            this.$refs.createProduct.open()
        },
        openFormEdit(item) {
            this.$refs.createProduct.open(item)
        }
    }
}
</script>
<style>
#list-product-maker .product-item .product-name {
    display: -webkit-box;
    line-height: 1.4;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
}
#list-product-maker .el-checkbox.el-checkbox--large .el-checkbox__inner {
    height: 18px;
    width: 18px;
}
#list-product-maker .el-checkbox__inner::after {
    height: 10px;
    left: 6px;
}
</style>