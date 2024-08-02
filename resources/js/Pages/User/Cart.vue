<template>
    <Head title="Điện thoại - Danh mục" />
    <AppLayout :isFooter="true">
        <template v-slot:main>
            <div id="cart-component">
                <div id="cart-product" class="sm:px-[48px] px-[18px] py-[32px] bg-[white]">
                    <div class="text-[20px] font-bold uppercase text-[#d0011b]">Giỏ hàng</div>
                    <div class="sm:mt-[32px] mt-[24px]">
                        <div class="sm:flex hidden items-center font-bold border-b-[1px] border-[#b2b2b2] pb-[12px]">
                            <div class="w-[55%] flex items-center">
                                <el-checkbox v-model="isSelectAll" @change="selectAll()" size="large" />
                                <span class="ml-[12px]">Sản phẩm</span>
                            </div>
                            <div class="flex-1 text-center">Giá tiền</div>
                            <div class="flex-1 text-center">Số lượng</div>
                            <div class="flex-1 text-center">Thành tiền</div>
                            <div class="flex-1 text-center">Thao tác</div>
                        </div>
                        <div class="product">
                            <template v-if="cartProducts.length == 0">
                                <div class="md:h-[150px] h-[80px] flex items-center justify-center">
                                    Chưa có sản phẩm nào trong giỏ hàng
                                </div>
                            </template>
                            <template v-else>
                                <div class="border-b-[1px] border-[#b2b2b2] pb-[18px]">
                                    <div v-for="(product, index) in cartProducts" class="sm:flex block mt-[18px]">
                                        <div class="sm:w-[55%] w-[100%] sm:flex sm:justify-between sm:gap-6">
                                            <div class="flex">
                                                <div class="flex items-center">                                    
                                                    <el-checkbox @change="changeSelect()" v-model="this.listCartSelect[index]" size="large" />
                                                </div>
                                                <img :src="product.image_url" alt="" class="ml-[8px] min-w-[60px] w-[60px] h-[60px]">
                                                <div class="ml-[8px] hidden-two-line">
                                                    <Link :href="product.route">{{ product.name }}</Link>
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
                                        <div class="sm:block hidden flex-1 text-center text-[#d0021c]">
                                            {{ formatPrice(product.quantity * product.price) }}
                                        </div>
                                        <div @click="removeCart(product)" class="sm:block hidden flex-1 text-center text-[#d0021c] text-[14px] cursor-pointer">
                                            Xóa
                                        </div>
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
                            </template>
                        </div>
                    </div>
                </div>
                <div id="suggestion-product" class="sm:mt-[32px] mt-[24px] mb-[48px]">
                    <div class="my-[18px] text-[20px] uppercase font-bold">Sản phẩm gợi ý</div>
                    <div class="grid md:grid-cols-4 lg:grid-cols-5 grid-cols-2 gap-4">
                        <div v-for="(product, index) in productSugestions" class="bg-[white] rounded-[4px] mb-[12px] border-[1px] border-[#D8D9DA]">
                            <Product :product="product" />
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </AppLayout>
</template>
<script>
import { mapActions, mapState } from 'pinia'
import { Head, Link } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/User/Layout.vue';
import Paginate from '@/Components/Pagination/Paginate.vue';
import { useCart } from '@/Store/Modules/cart.js'
import price from '@/Lib/price'
import Product from '@/Components/Product.vue'

export default {
    components: {
        Head,
        Link,
        AppLayout,
        Paginate,
        Product
    },
    mixins: [price],
    computed: {
        ...mapState(useCart, ['cartProducts']),
    },
    data: function () {
        return {
            isSelectAll: false,
            countSelect: 0,
            resultPrice: 0,
            listCartSelect: [
                false, false
            ],
            productSugestions: [
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
        ...mapActions(useCart, ['removeCart']),
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
                    this.resultPrice += this.cartProducts[i].price * this.cartProducts[i].quantity
                }
            }
            if(this.countSelect == this.listCartSelect.length) {
                this.isSelectAll = true
            } else {
                this.isSelectAll = false
            }
        },
        payment() {
            if(this.countSelect == 0) {
                this.$message({
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
#cart-component .el-checkbox__inner {
    width: 18px !important;
    height: 18px !important;
}
#cart-component .el-checkbox__inner::after {
    height: 10px !important;
    left: 6px !important;
}
#cart-component [type='text']:focus {
    --tw-ring-color: #000 !important;
}
#cart-component .el-checkbox:last-of-type {
    height: auto;
}
</style>