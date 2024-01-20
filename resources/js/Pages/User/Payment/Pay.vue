<template>
    <Head title="Điện thoại - Danh mục" />
    <AppLayout :isFooter="true">
        <template v-slot:main>
            <div class="main-tab">
                <div class="sm:px-[48px] px-[18px] py-[32px] bg-[white]">
                    <div class="mb-[12px] pb-[24px] border-b-[1px] border-b-[1px] border-[#b2b2b2]">
                        <div class="text-[18px] font-bold text-[#d0011b]">Địa chỉ nhận hàng</div>
                        <div class="flex justify-between items-center gap-4">
                            <div class="flex-1 mt-[12px] sm:flex block gap-8">
                                <div class="font-bold text-[15px]">Nguyễn Viết Thanh - 0358387102</div>
                                <div>Thôn Đồng Trữ, Phú Nghĩa, Chương Mỹ, Hà Nội</div>
                                <div class="sm:mt-[0px] mt-[8px] w-[90px] text-[#d0011b] py-[4px] border-[1px] border-[#d0011b] text-center text-[12px]">
                                    Mặc định
                                </div>
                            </div>
                            <div @click="changeAddress()" class="text-[blue] cursor-pointer border-[1px] border-[blue] px-[12px] py-[4px]">
                                Thay đổi
                            </div>
                        </div>
                    </div>
                    <div class="mt-[32px]">
                        <div class="sm:flex hidden items-center font-bold border-[#b2b2b2] pb-[12px]">
                            <div class="w-[60%] flex items-center">Sản phẩm</div>
                            <div class="flex-1 text-center">Giá tiền</div>
                            <div class="flex-1 text-center">Số lượng</div>
                            <div class="flex-1 text-center">Thành tiền</div>
                        </div>
                        <div id="cart-product-payment">
                            <div class="border-b-[1px] border-[#b2b2b2] pb-[18px]">
                                <div v-for="(product, index) in listCart" class="sm:flex block mt-[18px]">
                                    <div class="sm:w-[60%] w-[100%] sm:flex sm:justify-between sm:gap-6">
                                        <div class="flex">
                                            <Link :href="product.route">
                                                <img :src="product.image" alt="" class="ml-[8px] min-w-[60px] w-[60px] h-[60px]">
                                            </Link>
                                            <div class="ml-[8px] hidden-two-line">
                                                <Link :href="product.route">{{ product.product_name }}</Link>
                                            </div>
                                        </div>
                                        <div class="min-w-[100px]">
                                            Phân loại
                                        </div>
                                    </div>
                                    <div class="flex-1 sm:text-center text-end sm:mr-[0px] mr-[12px]">{{ formatPrice(product.price) }}</div>
                                    <div class="flex-1 text-center sm:mr-[0px] mr-[12px] sm:text-center text-end">x1</div>
                                    <div class="sm:block hidden flex-1 text-center text-[#d0021c]">{{ formatPrice(product.quantity * product.price) }}</div>
                                </div>
                            </div>
                            <div class="mt-[18px] sm:flex justify-end items-center">
                                <div class="flex justify-between items-center">
                                    <div class="sm:text-[16px] text-[14px]">Tổng thanh toán ({{ countSelect }} sản phẩm):</div>
                                    <div class="ml-[24px] text-[20px] text-[#d0021c]">{{ formatPrice(resultPrice) }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-[24px] sm:flex block items-center gap-4">
                            <div class="font-bold mb-[8px]">Lời nhắn cho người gửi</div>
                            <div class="flex-1 max-w-[500px]">
                                <el-input
                                    v-model="textarea"
                                    :rows="2"
                                    type="textarea"
                                    placeholder="Nhập lời nhắn"
                                />
                            </div>
                        </div>
                    </div>
                    <div class="mb-[32px] mt-[24px] sm:flex block justify-between items-center">
                        <div>
                            Vui lòng kiểm tra lại đơn hàng trước khi nhấn "mua hàng"
                        </div>
                        <div class="flex justify-end">
                            <div @click="payment()"
                                class="button mb-[4px] mt-[8px] cursor-pointer ml-[24px] min-w-[110px] text-center h-[38px] leading-[38px] border-[1px] text-[white] bg-[#d0011b]">
                                Mua hàng
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <EditAdressForm ref="editShipForm" @change-post="fetchData"/>
        </template>
    </AppLayout>
</template>
<script>
import { Head, Link, useForm } from '@inertiajs/vue3';
import { ElNotification } from 'element-plus'
import AppLayout from '@/Layouts/User/Layout.vue';
import EditAdressForm from './Ship/EditForm.vue'

export default {
    components: {
        Head,
        Link,
        AppLayout,
        EditAdressForm
    },
    async created() {
    },
    data: function () {
        return {
            isSelectAll: false,
            countSelect: 2,
            resultPrice: 100000,
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
        changeAddress() {
            this.$refs.editShipForm.open()
        },
        payment() {
            ElNotification({
                title: 'Mua hàng',
                message: 'Đặt hàng thành công',
                type: 'success',
            })
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
    --tw-ring-color: #000;
}
</style>