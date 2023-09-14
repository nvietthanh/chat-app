<template>
    <Head title="Danh sách sản phẩm nổi bật" />
    <div id="product-outstanding">
        <div class="mt-[18px] px-[12px]">
            <div class="grid md:grid-cols-3 lg:grid-cols-4 grid-cols-2 gap-4">
                <div v-for="index in 8" class="bg-[white] rounded-[4px] mb-[12px] border-[1px] border-[#D8D9DA]">
                    <Link :href="route('product', 1)">
                    <img src="/images/devices/phone/dienthoai-1.webp" alt=""
                        class="w-[100%] rounded-t-[4px] border-b-[1px] border-[#D8D9DA]">
                    <div class="px-[12px] pb-[12px] mt-[8px] min-h-[150px]">
                        <div>OPPO Reno10 5G 256GB Xanh</div>
                        <div class="font-bold my-[4px]">
                            <div class="flex items-end text-[12px]">
                                <div class="line-through">
                                    8.490.000₫
                                </div>
                                <div class="text-[14px] ml-[18px] text-[#d0021c]">-5%</div>
                            </div>
                            <div class="text-[#d0021c] text-[14px]">
                                8.490.000₫
                            </div>
                        </div>
                        <div class="flex items-center">
                            <div class="text-[#fb6e30] text-[10px]">
                                <i class="bi bi-star-fill mr-[2px]"></i>
                                <i class="bi bi-star-fill mr-[2px]"></i>
                                <i class="bi bi-star-fill mr-[2px]"></i>
                                <i class="bi bi-star-fill mr-[2px]"></i>
                                <i class="bi bi-star-half mr-[2px]"></i>
                            </div>
                            <span class="ml-[8px] text-[12px]">Đã bán 0k</span>
                        </div>
                    </div>
                    </Link>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/User/Layout.vue';
import Slider from '@/Components/User/Profile/Slider.vue';
import Paginate from '@/Components/Pagination/Paginate.vue';

export default {
    components: {
        Head,
        Link,
        AppLayout,
        Slider,
        Paginate,
    },
    async created() {
    },
    data: function () {
        return {
            user: {
                first_name: 'Nguyễn',
                last_name: 'Viết Thanh',
                email: 'th****oi@gmai.com',
                phone: '09****54',
                gender: 'Nam',
                birth_day: '16/11/2001',
                address: 'Thôn Đồng Trữ, Xã Phú Nghĩa, Huyện Chương Mỹ, Hà Nội',
                image: '/images/devices/phone/dienthoai-1.webp'
            },
            tabSelected: 'tab_1',
            paginate: [],
            filter: {
                limit: 15,
                page: 1,
                sort: 'default',
                sub_category: [],
                price: {
                    min: '',
                    max: ''
                },
                vote: '',
            },
        }
    },
    methods: {
        handleCurrentPage(value) {
            this.comments.filter.page = value
        },
    }
}
</script>