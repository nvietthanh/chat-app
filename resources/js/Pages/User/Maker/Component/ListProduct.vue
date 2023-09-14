<template>
    <Head title="Danh sách sản phẩm" />
    <div id="list-product-maker">
        <div class="flex justify-end mt-[12px]">
            <button 
                class="button w-[110px] text-center h-[38px] text-[white] bg-[#d0011b] cursor-pointer"
            > 
                Thêm mới
            </button>
        </div>
        <div class="py-[12px]">
            <draggable
                :list="items"
                item-key="name"
                handle=".handle"
                @end="onDragEnd"
            >
                <template #item="{ element }">
                    <div class="px-[12px] product-item flex items-center justify-between h-[100px] sm:gap-[2rem] 
                        gap-[1rem] border-b-[1px] cursor-pointer"
                    >
                        <div class="flex items-center w-[90%]">
                            <el-image src="/images/devices/phone/dienthoai-1.webp" class="h-[70px] w-[70px] object-cover"/>
                            <div class="sm:w-[80%] w-[90%]">
                                <div class="product-name font-bold text-[14px]">{{ element.product_name }}</div>
                                <div class="mt-[6px] flex items-center">
                                    <div class="font-bold text-[#d0021c]">{{ element.price }}</div>
                                    <div class="ml-[18px] text-white bg-[#d0021c] text-[12px] py-[2px] px-[4px]">
                                        -{{ element.percent_sale }}%
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="text-[30px] text-[#c8c3c3]">
                            <i class="bi bi-list handle"></i>
                        </button>
                    </div>
                </template>
            </draggable>
        </div>
    </div>
</template>
<script>
import { Head, Link, useForm } from '@inertiajs/vue3';
import Paginate from '@/Components/Pagination/Paginate.vue';
import draggable from "vuedraggable";
import { ElMessage, ElMessageBox } from 'element-plus'


export default {
    components: {
        Head,
        draggable,
    },
    data() {
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
            ]
        }
    },
    methods: {
        onDragEnd(event) {
            ElMessageBox.confirm(
                'Bạn có muốn thay đổi vị trí không?',
                'Warning',
                {
                    confirmButtonText: 'OK',
                    cancelButtonText: 'Hủy bỏ',
                    type: 'warning',
                }
            )
            .then(() => {
                ElMessage({
                    type: 'success',
                    message: 'Thay đổi vị trí thành công',
                })
                this.changeOrder(event)
            })
            .catch(() => {
                const movedItem = this.items.splice(event.newIndex, 1)[0];
                this.items.splice(event.oldIndex, 0, movedItem);
                ElMessage({
                    type: 'info',
                    message: 'Hủy bỏ thành công',
                })
            })
        },
        changeOrder(event) {
            console.log(this.items, event)
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
.sortable-ghost {
    opacity: 1;
    background-color: #dddddd;
}
</style>