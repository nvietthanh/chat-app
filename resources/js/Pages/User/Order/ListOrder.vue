<template>
    <Head title="Quản lý thông tin cá nhân" />
    <AppLayout :isFooter="true">
        <template v-slot:main>
            <div class="main-tab">
                <div class="grid grid-cols-12 gap-4">
                    <Slider :selected="'order'" :user="user" />
                    <div class="sm:col-start-5 lg:col-start-4 col-start-1 col-end-13 bg-[#fff]">
                        <div class="md:px-[24px] px-[18px] py-[12px]">
                            <div id="list-menu-order" class="overflow-y-scroll">
                                <div class="flex sm:border-b-[1px] border-[#b2b2b2]">
                                    <div @click="changeTab('tab_1')" class="sm:min-w-[140px] min-w-[100px] text-center h-[50px] leading-[50px] cursor-pointer font-bold"
                                     :class="{ 'border-[red] text-[#d0011b] border-b-[2px]' : tabSelected == 'tab_1' }">
                                        Tất cả
                                    </div>
                                    <div @click="changeTab('tab_2')" class="sm:min-w-[150px] min-w-[130px] text-center h-[50px] leading-[50px] cursor-pointer font-bold"
                                     :class="{ 'border-[red] text-[#d0011b] border-b-[2px]' : tabSelected == 'tab_2' }">
                                        Đang chuẩn bị
                                    </div>
                                    <div @click="changeTab('tab_3')" class="sm:min-w-[150px] min-w-[130px] text-center h-[50px] leading-[50px] cursor-pointer font-bold"
                                     :class="{ 'border-[red] text-[#d0011b] border-b-[2px]' : tabSelected == 'tab_3' }">
                                        Đang giao hàng
                                    </div>
                                    <div @click="changeTab('tab_4')" class="sm:min-w-[140px] min-w-[100px] text-center h-[50px] leading-[50px] cursor-pointer font-bold"
                                     :class="{ 'border-[red] text-[#d0011b] border-b-[2px]' : tabSelected == 'tab_4' }">
                                        Đã giao hàng
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div v-for="item in 6" class="sm:px-[18px] px-[4px] py-[14px] border-b-[1px]">
                                    <div class="mb-[12px]">
                                        <div class="flex">
                                            <Link :href="route('product', 1)">
                                                <img src="/images/devices/phone/dienthoai-1.webp" alt="" class="w-[50px] h-[50px] border-[1px]">
                                            </Link>
                                            <div class="ml-[12px] flex-1">
                                                <div class="sm:flex block justify-between">
                                                    <Link :href="route('product', 1)">
                                                        <div class="hidden-two-line">
                                                            Đánh giá thế giới Đánh giá thế giới Đánh giá thế giới Đánh giá thế giới
                                                        </div>
                                                    </Link>
                                                    <div class="ml-[18px] text-[14px]">
                                                        <div class="sm:mt-[0px] mt-[8px] text-[#d0021c] text-end">8.490.000₫</div>
                                                        <div class="mt-[2px] text-end">x5</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-[8px] flex justify-end text-[14px]">
                                            Thành tiền: 
                                            <span class="ml-[12px] text-[#d0021c] text-[16px]">20.000.000đ</span>
                                        </div>
                                    </div>
                                    <div class="flex justify-end gap-4">
                                        <div class="button mb-[4px] mt-[8px] w-[120px] text-center h-[38px] leading-[38px] border-[1px] cursor-pointer text-[white] bg-[#d0011b]">
                                            Đánh giá
                                        </div>
                                        <div class="button mb-[4px] mt-[8px] w-[160px] text-center h-[38px] leading-[38px] border-[1px] cursor-pointer">
                                            Liên hệ người bán
                                        </div>
                                        <div class="sm:block hidden button mb-[4px] mt-[8px] w-[120px] text-center h-[38px] leading-[38px] border-[1px] cursor-pointer">
                                            Mua lại
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
import Slider from '@/Components/User/Profile/Slider.vue';

export default {
    components: {
        Head,
        Link,
        AppLayout,
        Slider
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
            tabSelected: 'tab_1'
        }
    },
    methods: {
        changeTab(tab) {
            this.tabSelected = tab
        }
    }
}
</script>
<style>
#list-menu-order::-webkit-scrollbar {
    display: none;
}

/* Hide scrollbar for IE, Edge and Firefox */
#list-menu-order {
  -ms-overflow-style: none;  /* IE and Edge */
  scrollbar-width: none;  /* Firefox */
}
</style>