<template>
    <Head title="Quản lý thông tin cá nhân" />
    <AppLayout :isFooter="false">
        <template v-slot:main>
            <div class="main-tab">
                <div id="main-scroll" class="grid grid-cols-12 gap-4">
                    <Slider :selected="'my-sell'" :user="user" />
                    <div class="sm:col-start-5 lg:col-start-4 col-start-1 col-end-13 bg-[#fff] max-h-[100%] overflow-scroll">
                        <div id="maker-default" class="bg-[white] py-[18px] px-[12px] mb-[32px]">
                            <div id="list-maker-menu" class="overflow-y-scroll">
                                <div class="flex sm:border-b-[1px] border-[#b2b2b2]">
                                    <div @click="changeTab('tab_1')"
                                        class="button min-w-[100px] sm:min-w-[150px] text-center h-[50px] leading-[50px] cursor-pointer font-bold"
                                        :class="{ 'border-[red] text-[#d0011b] border-b-[2px]': tabSelected == 'tab_1' }">
                                        Giới thiệu
                                    </div>
                                    <div @click="changeTab('tab_2')"
                                        class="button min-w-[100px] sm:min-w-[180px] text-center h-[50px] leading-[50px] cursor-pointer font-bold"
                                        :class="{ 'border-[red] text-[#d0011b] border-b-[2px]': tabSelected == 'tab_2' }">
                                        Sản phẩm
                                    </div>
                                    <div @click="changeTab('tab_3')"
                                        class="button min-w-[100px] sm:min-w-[180px] text-center h-[50px] leading-[50px] cursor-pointer font-bold"
                                        :class="{ 'border-[red] text-[#d0011b] border-b-[2px]': tabSelected == 'tab_3' }">
                                        Nổi bật
                                    </div>
                                    <div @click="changeTab('tab_4')"
                                        class="button min-w-[100px] sm:min-w-[180px] text-center h-[50px] leading-[50px] cursor-pointer font-bold"
                                        :class="{ 'border-[red] text-[#d0011b] border-b-[2px]': tabSelected == 'tab_4' }">
                                        Săn sale
                                    </div>
                                </div>
                            </div>
                            <div>
                                <InforForm v-if="tabSelected == 'tab_1'" />
                                <ListProduct v-if="tabSelected == 'tab_2'" />
                                <ListProductOutstand v-if="tabSelected == 'tab_3'" />
                                <ListProductSale v-if="tabSelected == 'tab_4'" />
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
import InforForm from './MySellComponent/Infor.vue';
import ListProduct from './MySellComponent/ListProduct.vue';
import ListProductSale from './MySellComponent/ListSale.vue';
import ListProductOutstand from './MySellComponent/ListOutstand.vue';


export default {
    components: {
        Head, Link, AppLayout, Slider, Paginate,
        InforForm, ListProduct, ListProductSale, 
        ListProductOutstand
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
            tabSelected: 'tab_4',
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
#main-scroll {
    height: calc(100vh - 116px);
}
</style>