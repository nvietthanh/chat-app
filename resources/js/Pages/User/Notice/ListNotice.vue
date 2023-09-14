<template>
    <Head title="Quản lý thông tin cá nhân" />
    <AppLayout :isFooter="true">
        <template v-slot:main>
            <div class="main-tab">
                <div class="grid grid-cols-12 gap-4">
                    <Slider :selected="'notice'" :user="user" />
                    <div class="sm:col-start-5 lg:col-start-4 col-start-1 col-end-13 bg-[#fff]">
                        <div class="md:px-[24px] px-[18px] py-[24px]">
                            <div class="font-bold pb-[18px] border-b-[1px] border-[#b2b2b2]">
                                <Link :href="route('home')" class="text-[#d0011b]">
                                    Trang chủ
                                </Link>
                                <i class="bi bi-chevron-right mx-[3px]"></i>
                                <span class="ml-[4px]">Thông báo</span>
                            </div>
                            <div class="mt-[18px]">
                                <div>
                                    <div v-for="item in 4"
                                     class="flex justify-between border-b-[1px] mb-[2px] bg-[#ededed] px-[12px] py-[8px]">
                                        <div class="flex items-center">
                                            <img src="/images/devices/phone/dienthoai-1.webp" alt="" class="w-[60px] h-[60px]">
                                            <div class="hidden-two-line ml-[8px] sm:mr-[24px] mr-[4px]">
                                                Thông báo đơn hàng đang trong quá trình vận chuyển
                                            </div>
                                        </div>
                                        <div class="sm:block hidden h-[32px] leading-[32px] text-[12px] min-w-[120px] text-center bg-[#fff] border-[1px]">
                                            Đánh giá sản phẩm
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-[18px] flex justify-center">
                                    <Paginate @page-change="handleCurrentPage" 
                                        :paginate="notices.paginate" 
                                        :current-page="notices.filter.page || 1"
                                        paginate-background/>
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
            notices: {
                paginate: [],
                filter: {
                    limit: 15,
                    page: 1,
                },
            }
        }
    },
    methods: {
        handleCurrentPage(value) {
            this.comments.filter.page = value
        },
    }
}
</script>