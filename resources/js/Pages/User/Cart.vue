<template>
    <Head title="Điện thoại - Danh mục" />
    <AppLayout :isFooter="true">
        <template v-slot:main>
            <div class="main-tab">
                <div class="sm:px-[48px] px-[18px] py-[32px] bg-[white]">
                    <div class="text-[20px] font-bold uppercase text-[#d0011b]">Giỏ hàng</div>
                    <div class="sm:mt-[32px] mt-[24px]">
                        <div class="sm:flex hidden items-center font-bold border-b-[1px] border-[#b2b2b2] pb-[12px]">
                            <div class="w-[55%] flex items-center">
                                <el-checkbox v-model="isSelectAll" @change="selectAll()" size="large" />
                                <span class="ml-[12px]">Sản phẩm</span>
                            </div>
                            <div class="flex-1 text-center">
                                Giá tiền
                            </div>
                            <div class="flex-1 text-center">
                                Số lượng
                            </div>
                            <div class="flex-1 text-center">
                                Thành tiền
                            </div>
                            <div class="flex-1 text-center">
                                Thao tác
                            </div>
                        </div>
                        <div id="cart-product">
                            <div class="border-b-[1px] border-[#b2b2b2] pb-[18px]">
                                <div v-for="(product, index) in listCart" class="sm:flex block mt-[18px]">
                                    <div class="sm:w-[55%] w-[100%] sm:flex sm:justify-between sm:gap-6">
                                        <div class="flex">
                                            <div class="flex items-center">                                    
                                                <el-checkbox @change="changeSelect()" v-model="this.listCartSelect[index]" size="large" />
                                            </div>
                                            <img :src="product.image" alt="" class="ml-[8px] min-w-[60px] w-[60px] h-[60px]">
                                            <div class="ml-[8px] hidden-two-line">
                                                <Link :href="product.route">{{ product.product_name }}</Link>
                                            </div>
                                        </div>
                                        <div class="min-w-[100px]">
                                            Phân loại
                                        </div>
                                    </div>
                                    <div class="flex-1 sm:text-center text-end sm:mr-[0px] mr-[24px]">{{ formatPrice(product.price) }}</div>
                                    <div class="flex-1 text-center  sm:mr-[12px] mr-[12px]">
                                        <div class="flex sm:justify-normal justify-end sm:my-[0px] my-[8px]">
                                            <button @click="product.quantity > 1 ? product.quantity-- : 1 ; changeSelect()"
                                             class="w-[30px] h-[31px] bg-white text-center text-[20px] border-[1px] border-[#000]">
                                                -
                                            </button>
                                            <input type="text" min="1"
                                                v-model="product.quantity"
                                                @keyup="product.quantity = (product.quantity).replace(/\D/g, '') ; changeSelect()"
    
                                                class="w-[50px] h-[31px] text-center border-[1px] border-[#000] text-[14px] z-50">
                                            <button @click="product.quantity++ ; changeSelect()"
                                             class="w-[30px] h-[31px] bg-white text-center text-[20px] border-[1px] border-[#000]">
                                                +
                                            </button>
                                        </div>
                                    </div>
                                    <div class="sm:block hidden flex-1 text-center text-[#d0021c]">{{ formatPrice(product.quantity * product.price) }}</div>
                                    <div class="sm:block hidden flex-1 text-center text-[#d0021c] text-[14px] cursor-pointer">Xóa</div>
                                </div>
                            </div>
                            <div class="mt-[18px] sm:flex justify-end items-center">
                                <div class="flex justify-between items-center">
                                    <div class="sm:text-[18px] text-[14px]">Tổng thanh toán ({{ countSelect }} sản phẩm):</div>
                                    <div class="ml-[24px] text-[20px] text-[#d0021c]">{{ formatPrice(resultPrice) }}</div>
                                </div>
                                <div class="flex justify-end">
                                    <div @click="payment()"
                                     class="button cursor-pointer mb-[4px] mt-[8px] ml-[24px] w-[110px] text-center h-[38px] leading-[38px] border-[1px] text-[white] bg-[#d0011b]">
                                        Thanh toán
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sm:mt-[32px] mt-[24px] mb-[48px]">
                    <div class="my-[18px] text-[20px] uppercase font-bold">Sản phẩm gợi ý</div>
                    <div class="grid md:grid-cols-4 lg:grid-cols-5 grid-cols-2 gap-4">
                        <div v-for="(product, index) in listProduct" class="bg-[white] rounded-[4px] mb-[12px] border-[1px] border-[#D8D9DA]">
                            <Link :href="product.route">
                                <img :src="product.image" alt="" class="w-[100%] rounded-t-[4px] border-b-[1px] border-[#D8D9DA]">
                                <div class="px-[12px] pb-[12px] mt-[8px] min-h-[150px]">
                                    <div class="hidden-two-line">{{ product.product_name }}</div>
                                    <div class="font-bold my-[4px]">
                                        <div class="flex items-end text-[12px]">
                                            <div class="line-through">{{ product.price }}</div>
                                            <div class="text-[14px] ml-[18px] text-[#d0021c]">-{{ product.sale }}%</div>
                                        </div>
                                        <div class="text-[#d0021c] text-[14px]">{{ product.price - product.price*product.sale/100 }}</div>
                                    </div>
                                    <div class="flex items-center">
                                        <div class="text-[#fb6e30] text-[10px]">
                                            <template v-if="product.evaluate > 1">
                                                <i v-for="item in Math.floor(product.evaluate)" class="bi bi-star-fill mr-[2px]"></i>
                                            </template>
                                            <i v-if="product.evaluate != Math.floor(product.evaluate)" class="bi bi-star-half mr-[2px]"></i>
                                        </div>
                                        <span class="ml-[8px] text-[12px]">Đã bán {{ formatValue(product.sell_quality) }}</span>
                                    </div>
                                </div>
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </AppLayout>
</template>
<script>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/User/Layout.vue';
import Paginate from '@/Components/Pagination/Paginate.vue';
import { ElMessage, ElMessageBox } from 'element-plus'

export default {
    components: {
        Head,
        Link,
        AppLayout,
        Paginate,
    },
    async created() {
    },
    data: function () {
        return {
            isSelectAll: false,
            countSelect: 0,
            resultPrice: 0,
            listCart: [
                {
                    route: route('product', 1),
                    product_code: '20000000',
                    image: '/images/devices/phone/dienthoai-1.webp',
                    product_name: 'Điện thoại phổ thông Apple phổ thông Apple phổ thông Apple phổ thông Apple phổ thông Apple',
                    price: 2000000,
                    quantity: 3
                },
                {
                    route: route('product', 1),
                    product_code: '20000000',
                    image: '/images/devices/phone/dienthoai-1.webp',
                    product_name: 'Điện thoại phổ thông Apple',
                    price: 2000000,
                    quantity: 3
                },
            ],
            listCartSelect: [
                false, false
            ],
            listProduct: [
                {
                    route: route('product', 1),
                    image: '/images/devices/phone/dienthoai-1.webp',
                    product_code: '20000000',
                    product_name: 'Điện thoại phổ thông Apple',
                    price: 2000000,
                    sale: 10,
                    sell_quality: 411,
                    evaluate: 4.5
                },
                {
                    route: route('product', 1),
                    image: '/images/devices/phone/dienthoai-1.webp',
                    product_code: '20000000',
                    product_name: 'Điện thoại phổ thông Apple',
                    price: 2000000,
                    sale: 10,
                    sell_quality: 411,
                    evaluate: 4.5
                },
                {
                    route: route('product', 1),
                    image: '/images/devices/phone/dienthoai-1.webp',
                    product_code: '20000000',
                    product_name: 'Điện thoại phổ thông Apple',
                    price: 2000000,
                    sale: 10,
                    sell_quality: 411,
                    evaluate: 4.5
                },
                {
                    route: route('product', 1),
                    image: '/images/devices/phone/dienthoai-1.webp',
                    product_code: '20000000',
                    product_name: 'Điện thoại phổ thông Apple',
                    price: 2000000,
                    sale: 10,
                    sell_quality: 411,
                    evaluate: 4.5
                },
                {
                    route: route('product', 1),
                    image: '/images/devices/phone/dienthoai-1.webp',
                    product_code: '20000000',
                    product_name: 'Điện thoại phổ thông Apple',
                    price: 2000000,
                    sale: 10,
                    sell_quality: 411,
                    evaluate: 4.5
                },
                {
                    route: route('product', 1),
                    image: '/images/devices/phone/dienthoai-1.webp',
                    product_code: '20000000',
                    product_name: 'Điện thoại phổ thông Apple',
                    price: 2000000,
                    sale: 10,
                    sell_quality: 411,
                    evaluate: 4.5
                },
                {
                    route: route('product', 1),
                    image: '/images/devices/phone/dienthoai-1.webp',
                    product_code: '20000000',
                    product_name: 'Điện thoại phổ thông Apple',
                    price: 2000000,
                    sale: 10,
                    sell_quality: 411,
                    evaluate: 4.5
                }
            ]
        }
    },
    methods: {
        selectAll() {
            for(let i = 0; i < this.listCartSelect.length; i++) {
                this.listCartSelect[i] = this.isSelectAll
            }
            this.changeSelect()
        },
        changeSelect() {
            this.resultPrice = 0
            this.countSelect = 0
            for(let i = 0; i < this.listCartSelect.length; i++) {
                if(this.listCartSelect[i]) {
                    this.countSelect++
                    this.resultPrice += this.listCart[i].price * this.listCart[i].quantity
                }
            }
            if(this.countSelect == this.listCartSelect.length) {
                this.isSelectAll = true
            } else {
                this.isSelectAll = false
            }
        },
        formatPrice(price) {
            return price.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' })
        },
        formatValue(value) {
            if (value >= 1000000) {
                return (value / 1000000).toFixed(1) + 'tr';
            } else if (value >= 1000) {
                return (value / 1000).toFixed(1) + 'k';
            } else {
                return value.toString();
            }
        },
        payment() {
            if(this.countSelect == 0) {
                ElMessage({
                    type: 'warning',
                    message: 'Vui lòng chọn sản phẩm thanh toán',
                })
            } else {
                this.$inertia.visit(route('payment'))
            }
        }
    }
}
</script>
<style>
.el-checkbox__inner {
    width: 18px !important;
    height: 18px !important;
}
.el-checkbox__inner::after {
    height: 10px !important;
    left: 6px !important;
}
[type='text']:focus {
    --tw-ring-color: #000 !important;
}
.el-checkbox:last-of-type {
    height: auto;
}
</style>