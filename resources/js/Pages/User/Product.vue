<template>
    <Head title="Danh sách sản phẩm" />
    <AppLayout :isFooter="true" :dataCart="this.listCart">
        <template v-slot:main>
            <div class="main-tab">
                <div id="product-profile">
                    <div class="pb-[12px]">
                        <div class="bg-[white] py-[18px] px-[12px]">
                            <div class="grid md:grid-cols-10 grid-cols-1 gap-6">
                                <div class="md:col-start-1 md:col-end-5">
                                    <div>
                                        <img src="/images/devices/phone/dienthoai-1.webp" alt=""
                                            class="h-[100%] w-[100%] border-[1px]">
                                    </div>
                                    <div class="grid grid-cols-5 gap-0">
                                        <img src="/images/devices/phone/dienthoai-1.webp" alt=""
                                            class="border-[1px]">
                                        <img src="/images/devices/phone/dienthoai-1.webp" alt=""
                                            class="border-[1px]">
                                        <img src="/images/devices/phone/dienthoai-1.webp" alt=""
                                            class="border-[1px]">
                                        <img src="/images/devices/phone/dienthoai-1.webp" alt=""
                                            class="border-[1px]">
                                    </div>
                                </div>
                                <div class="md:col-start-5 md:col-end-11 mt-[4px]">
                                    <div class="border-b-[1px] border-[#bdbdbd] pb-[8px] flex items-center gap-4">
                                        <div>
                                            🔥Áo Khoác 🔥Bóng Chày Có Mũ Trùm Dáng Rộng Màu Gradient Phong Cách Đường Phố Hàn Quốc
                                             Cá Tính Faru099
                                        </div>
                                        <div class="mr-[8px] text-[20px] text-[red]">
                                            <i class="bi bi-heart-fill"></i>
                                        </div>
                                    </div>
                                    <div class="mb-[4px] mt-[8px] flex">
                                        <div class="text-[#fb6e30] text-[14px]">
                                            <span class="underline mr-[4px] text-[16px]">4.4</span>
                                            <i class="bi bi-star-fill mr-[2px]"></i>
                                            <i class="bi bi-star-fill mr-[2px]"></i>
                                            <i class="bi bi-star-fill mr-[2px]"></i>
                                            <i class="bi bi-star-fill mr-[2px]"></i>
                                            <i class="bi bi-star-half mr-[2px]"></i>
                                        </div>
                                        <div class="w-[1px] bg-[#000] mx-[12px]"></div>
                                        <div>
                                            4.4k đánh giá
                                        </div>
                                        <div class="w-[1px] bg-[#000] mx-[12px]"></div>
                                        <div>
                                            4.4k lượt bán
                                        </div>
                                    </div>
                                    <div class="flex items-end font-bold my-[12px]">
                                        <div class="flex items-end text-[14px]">
                                            <div class="line-through">
                                                8.490.000₫
                                            </div>
                                        </div>
                                        <div class="ml-[18px] text-[#d0021c] text-[18px]">
                                            8.490.000₫
                                        </div>
                                        <div class="ml-[18px] bg-[#d0021c] text-[12px] py-[2px] px-[4px] text-white">
                                            -10% giảm
                                        </div>
                                    </div>
                                    <div class="product-infor mt-[18px]">
                                        <div class="flex items-center">
                                            <div class="w-[120px]">
                                                Số lượng
                                            </div>
                                            <div class="flex">
                                                <button @click="cartNumber > 1 ? cartNumber-- : 1" class="w-[40px] h-[31px] bg-white text-center text-[20px] border-[1px] border-[#000]">
                                                    -
                                                </button>
                                                <input type="text" min="1"
                                                    v-model="cartNumber"
                                                    @keyup="this.cartNumber = (this.cartNumber).replace(/\D/g, '')"
                                                    class="w-[60px] h-[31px] text-center text-[14px] z-50">
                                                <button @click="cartNumber++" class="w-[40px] h-[31px] bg-white text-center text-[20px] border-[1px] border-[#000]">
                                                    +
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="my-[32px] flex gap-2">
                                        <button :disabled="is_loading_button"
                                            @click="addToCart()" class="px-[18px] h-[44px] flex items-center border-[1px] border-[#d0011b] text-[#d0011b] bg-[#ffeee8] rounded-[4px]">
                                            <i class="bi bi-cart-plus text-[20px] mr-[4px]"></i>
                                            Thêm vào giỏ hàng
                                        </button>
                                        <button class="px-[18px] h-[44px] flex items-center border-[1px] border-[#d0011b] text-[white] bg-[#d0011b] rounded-[4px]">
                                            <i class="bi bi-cart-plus text-[20px] mr-[4px]"></i>
                                            Mua ngay
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="maker-infor">
                            <div class="my-[18px] md:flex block gap-6 bg-[white]">
                                <div class="h-[100%] flex py-[18px] sm:px-[18px] px-[8px] mr-[18px]">
                                    <img src="/images/devices/phone/dienthoai-1.webp" alt="" class="md:h-[90px] h-[80px] rounded-[50%] border-[1px]">
                                    <div class="ml-[8px]">
                                        <div>Faruiline Official Store</div>
                                        <div class="text-[12px]">Online 2 Giờ trước</div>
                                        <div class="flex gap-2 text-[12px] mt-[8px]">
                                            <div class="cursor-pointer px-[12px] h-[32px] flex justify-center items-center border-[1px] border-[#d0011b] text-[#d0011b] bg-[#ffeee8]">
                                                <i class="bi bi-chat-square-text text-[16px] mr-[4px]"></i>
                                                Chat ngay
                                            </div>
                                            <div class="cursor-pointer px-[12px] h-[32px] flex justify-center items-center border-[1px] border-[#8d8d8d]">
                                                <i class="bi bi-shop text-[16px] mr-[4px] mb-[2px]"></i>
                                                Xem shop
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-[1px] sm:my-[24px] my-[0px] bg-[#e7e7e7] mx-[8px]"></div>
                                <div class="flex-1">
                                    <div class="h-[100%] flex items-center gap-10 py-[18px] sm:px-[18px] px-[24px]">
                                        <div class="w-[30%]">
                                            <div class="flex">
                                                <div class="w-[100px]">
                                                    Đánh giá
                                                </div>
                                                <div>
                                                    99%
                                                </div>
                                            </div>
                                            <div class="flex mt-[8px]">
                                                <div class="w-[100px]">
                                                    Sản phẩm
                                                </div>
                                                <div>
                                                    999
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="flex">
                                                <div class="w-[130px]">
                                                    Ngày tham gia
                                                </div>
                                                <div>
                                                    99%
                                                </div>
                                            </div>
                                            <div class="flex mt-[8px]">
                                                <div class="w-[130px]">
                                                    Sản phẩm
                                                </div>
                                                <div>
                                                    999
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="product-infor">
                            <div class="my-[18px] gap-6 bg-[white] pt-[32px] pb-[64px] sm:px-[32px] px-[18px]">
                                <div class="product-default">
                                    <div class="uppercase text-[18px]">Chi tiết sản phẩm</div>
                                    <div class="my-[18px]">
                                        <div class="flex mt-[12px]">
                                            <div class="w-[150px]">Danh mục</div>
                                            <div>Điện thoại</div>
                                        </div>
                                        <div class="flex mt-[12px]">
                                            <div class="w-[150px]">Kích cỡ</div>
                                            <div>Lớn</div>
                                        </div>
                                        <div class="flex mt-[12px]">
                                            <div class="w-[150px]">Kho hàng</div>
                                            <div>Lớn</div>
                                        </div>
                                        <div class="flex mt-[12px]">
                                            <div class="w-[150px]">Năm sản xuất</div>
                                            <div>2019</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-desc mt-[50px]">
                                    <div class="uppercase text-[18px]">Chi tiết sản phẩm</div>
                                    <div class="my-[12px] leading-[28px]">
                                        <div>
                                            1. Vui lòng tham khảo mẫu trước hoặc bảng kích thước để biết kích thước chi tiết. Kích thước tổng thể phần thân dưới của shop là rộng rãi, phần thân trên ôm và rộng. Nếu bạn không chắc mình mặc kích cỡ bao nhiêu, bạn có thể cho chúng tôi biết chiều cao và cân nặng của bạn, chúng tôi sẽ tư vấn chuyên nghiệp cho bạn
                                        </div>
                                        <div>
                                            2. Tất cả các sản phẩm được gửi từ Trung Quốc, hàng được gửi đến trung tâm vận chuyển hậu cần quốc tế. Sau khi chúng tôi gửi hàng sẽ không hiển thị ngay, vì chúng tôi cần phải đến trung tâm trung chuyển quốc tế trước, và thông tin hậu cần sẽ hiển thị sau khi nhân viên đăng ký gửi hàng. Xin hãy kiên nhẫn ~~
                                        </div>
                                        <div>
                                            3. Nếu bạn không thể mở lỗ khuy quần jean của mình, hãy yên tâm sử dụng tất cả các quần jean mới từ Trung Quốc đại lục. Đây không phải là một sản phẩm lỗi chưa hoàn thiện, mà là để đảm bảo tính toàn vẹn của sản phẩm ở mức độ cao nhất ~~
                                        </div>
                                        <div>
                                            4. Shop chúng tôi sẽ kiểm tra trước khi giao, tuy nhiên thỉnh thoảng cũng có sơ sót. Ví dụ, hàng nhận được bị lỗi, thiếu sót và các vấn đề về chất lượng sau khi nhận được. Xin vui lòng liên hệ với chúng tôi sớm nhất có thể. Chúng tôi rất chân thành và có trách nhiệm với bạn ~~
                                        </div>
                                        <div>
                                            5. Nếu bạn hài lòng với các sản phẩm và dịch vụ của chúng tôi, xin vui lòng cho chúng tôi 5 sao. Cảm ơn các bạn đã ủng hộ và chúc bạn một cuộc sống vui vẻ ~~
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="product-votes">
                            <div class="py-[12px] bg-[white]">
                                <div class="gap-6 bg-[white] pt-[18px] pb-[24px] sm:px-[32px] px-[18px]">
                                    <div class="uppercase text-[18px]">Chi tiết sản phẩm</div>
                                    <div class="mt-[18px]">
                                        <div class="border-[1px] bg-[#fffbf8]">
                                            <div class="sm:px-[32px] px-[18px] sm:py-[24px] py-[12px] sm:flex block gap-6">
                                                <div class="text-[#ee4d2d] mr-[24px]">
                                                    <div class="text-[20px]">
                                                        <span class="text-[24px]">4.4</span>
                                                        trên
                                                        <span class="text-[24px]">5</span>
                                                    </div>
                                                    <div class="text-[17px]">
                                                        <i class="bi bi-star-fill mr-[2px]"></i>
                                                        <i class="bi bi-star-fill mr-[2px]"></i>
                                                        <i class="bi bi-star-fill mr-[2px]"></i>
                                                        <i class="bi bi-star-fill mr-[2px]"></i>
                                                        <i class="bi bi-star-half mr-[2px]"></i>
                                                    </div>
                                                </div>
                                                <div class="sm:mt-[4px] mt-[12px]">
                                                    <div class="grid lg:grid-cols-6 md:grid-cols-4 grid-cols-3 gap-4">
                                                        <div class="px-[20px] py-[4px] flex items-center justify-center rounded-[4px] text-center border-[1px] border-[#8d8d8d] cursor-pointer border-[#ee4d2d] text-[#ee4d2d]">
                                                            Tất cả
                                                        </div>
                                                        <div class="px-[14px] py-[4px] flex items-center justify-center rounded-[4px] text-center border-[1px] border-[#8d8d8d] cursor-pointer">
                                                            5 sao (2k5)
                                                        </div>
                                                        <div class="px-[14px] py-[4px] flex items-center justify-center rounded-[4px] text-center border-[1px] border-[#8d8d8d] cursor-pointer">
                                                            4 sao (2k5)
                                                        </div>
                                                        <div class="px-[14px] py-[4px] flex items-center justify-center rounded-[4px] text-center border-[1px] border-[#8d8d8d] cursor-pointer">
                                                            3 sao (2k5)
                                                        </div>
                                                        <div class="px-[14px] py-[4px] flex items-center justify-center rounded-[4px] text-center border-[1px] border-[#8d8d8d] cursor-pointer">
                                                            2 sao (2k5)
                                                        </div>
                                                        <div class="px-[14px] py-[4px] flex items-center justify-center rounded-[4px] text-center border-[1px] border-[#8d8d8d] cursor-pointer">
                                                            1 sao (2k5)
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="list-votes" class="mt-[24px]">
                                            <div v-for="item in 4" class="flex pt-[18px] pb-[24px] border-b-[1px]">
                                                <img src="/images/devices/phone/dienthoai-1.webp" alt="" class="w-[60px] h-[60px] rounded-[50%] border-[1px]">
                                                <div class="ml-[6px]">
                                                    <div class="font-bold">Nguyễn Viết Thanh</div>
                                                    <div class="text-[#ee4d2d] text-[13px]">
                                                        <i class="bi bi-star-fill mr-[2px]"></i>
                                                        <i class="bi bi-star-fill mr-[2px]"></i>
                                                        <i class="bi bi-star-fill mr-[2px]"></i>
                                                        <i class="bi bi-star-fill mr-[2px]"></i>
                                                    </div>
                                                    <div class="mt-[8px] break-all">
                                                        Vui lòng tham khảo mẫu trước hoặc bảng kích thước để biết kích thước chi tiết. Kích thước tổng thể phần thân dưới của shop là rộng rãi, phần thân trên ôm và rộng.
                                                    </div>
                                                    <div class="mt-[12px]">
                                                        <img src="/images/devices/phone/dienthoai-1.webp" alt="" class="w-[60px] h-[60px] border-[1px]">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-[18px] flex justify-center">
                                                <Paginate @page-change="handleCurrentPage" 
                                                    :paginate="comments.paginate" 
                                                    :current-page="comments.filter.page || 1"
                                                    paginate-background/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
import { ElMessage } from 'element-plus'

export default {
    components: {
        Head,
        Link,
        AppLayout,
        Paginate,
    },
    data: function () {
        return {
            cartNumber: 1,
            listCart: this.$page.props.product_cart,
            is_loading_button: false,
            errors: [],
            comments: {
                paginate: [],
                filter: {
                    limit: 15,
                    page: 1,
                },
            },
        }
    },
    methods: {
        handleCurrentPage(value) {
            this.comments.filter.page = value
        },
        addToCart() {
            this.is_loading_button = true
            let item = {
                'route' : route('product', 1),
                'product_name' : 'Điện thoại máy tính xách tay test làm gì mà căng',
                'image' : '/images/devices/phone/dienthoai-1.webp',
                'price' : 200000,
                'quality' : 5
            }
            this.listCart.push(item)
            ElMessage({
                message: 'Đặt hàng thành công',
                type: 'success',
                duration: 1000,
                showClose: true,
                onClose: () => {
                    this.is_loading_button = false
                }
            })
        },
    },
    
}
</script>
<style>
#product-profile [type='text']:focus {
    --tw-ring-color: #000 !important;
}
</style>