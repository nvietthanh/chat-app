<template>
    <Head title="Danh sách sản phẩm sale" />
    <div id="list-product-sale">
        <div class="flex justify-between gap-4 mt-[12px]">
            <div class="flex gap-1">
                <el-date-picker
                    v-model="filter.date"
                    type="date"
                    placeholder="Chọn ngày"
                    format="YYYY-MM-DD"
                    value-format="YYYY-MM-DD"
                    class="sm:!w-[200px] !w-[140px]"
                />
                <button class="px-[16px] text-center h-[32px] text-[white] bg-[#d0011b]" @click="fetchData">
                    <i class="bi bi-search"></i>
                </button>
            </div>
            <button class="w-[100px] text-center h-[32px] text-[white] bg-[#d0011b]" @click="openFormCreate">
                Thêm mới
            </button>
        </div>
        <div class="mt-[18px]">
            <div 
                v-for="index in 4" :key="index"
                class="py-[10px] sm:px-[24px] px-[19px] my-[6px] border-b-[1px] border-l-[6px] border-l-[#d0011b] cursor-pointer"
                @click="editSale()"
            >
                <div>
                    <b>Thời gian : </b>
                    <span>12:00 - 14:00</span>
                </div>
                <div class="flex mt-[4px]">
                    <span>
                        <b>Số lượng</b>: 14
                    </span>
                    <span class="sm:mx-[24px] mx-[12px]">-</span>
                    <span>
                        <b>Số lượng bán:</b>: 14
                    </span>
                </div>
            </div>
        </div>
        <CreateSale ref="createSaleForm"/>
        <EditSale ref="editSaleForm"/>
    </div>
</template>
<script>
import { Head, Link, useForm } from '@inertiajs/vue3';
import Paginate from '@/Components/Pagination/Paginate.vue';
import CreateSale from './SaleComponent/Create.vue'
import EditSale from './SaleComponent/Edit.vue'
import { dayjs } from 'element-plus';

export default {
    components: {
        Head, Link, CreateSale, EditSale
    },
    async created() {
    },
    data: function () {
        return {
            loading: false,
            listTimeSale: [
                {
                    time: '12:00',
                    status: 1,
                },
                {
                    time: '13:00',
                    status: 0,
                },
                {
                    time: '14:00',
                    status: 0,
                },
                {
                    time: '15:00',
                    status: 0,
                },
                {
                    time: '16:00',
                    status: 0,
                },
                {
                    time: '17:00',
                    status: 0,
                },
            ],
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
            filter: {
                date: dayjs()
            },
            timeSelect: 1
        }
    },
    methods: {
        openFormCreate() {
            this.$refs.createSaleForm.open()
        },
        editSale() {
            this.$refs.editSaleForm.open()
        }
    }
}
</script>