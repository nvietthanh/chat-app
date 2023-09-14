<template>
    <div class="col-start-1 sm:col-end-5 lg:col-end-4 col-end-13 bg-[#fff] px-[18px] py-[18px] sm:block hidden">
        <div>
            <div class="mb-[12px]">
                <Link v-if="checkTab('maker')" :href="route('setting.profile')">
                    <i class="bi bi-chevron-left"></i>
                    <span class="ml-[4px]">Trang mua hàng</span>
                </Link>
                <Link v-else :href="route('maker.purchase-order')">
                    <i class="bi bi-chevron-left"></i>
                    <span class="ml-[4px]">Trang bán hàng</span>
                </Link>
            </div>
            <div class="pb-[12px] mb-[8px] border-b-[1px] border-[#b2b2b2]">
                <div class="flex justify-center">
                    <img :src="user.image" alt=""
                        class="rounded-[50%] border-[1px]"
                        style="width: 100px; height: 100px;">
                </div>
                <div class="text-center mt-[8px] font-bold">{{ user.first_name + ' ' + user.last_name }}</div>
            </div>
            <template v-if="checkTab('maker')">
                <Link :href="route('maker.purchase-order')" class="py-[6px] flex items-center" :class="{ 'text-[#d0011b]' : selected == 'purchase-order' }">
                    <i class="bi bi-bag text-[18px] ml-[8px]"></i>
                    <span class="ml-[12px]">Đơn đặt hàng</span>
                </Link>
                <Link :href="route('maker.my-sell')" class="py-[6px] flex items-center" :class="{ 'text-[#d0011b]' : selected == 'my-sell' }">
                    <i class="bi bi-shop text-[18px] ml-[8px]"></i>
                    <span class="ml-[12px]">Trang bán hàng</span>
                </Link>
            </template>
            <template v-else>
                <Link :href="route('setting.profile')" class="py-[6px] flex items-center" :class="{ 'text-[#d0011b]' : selected == 'account' }">
                    <i class="bi bi-person text-[20px] ml-[8px]"></i>
                    <span class="ml-[12px] mt-[2px]">Tài khoản của tôi</span>
                </Link>
                <Link :href="route('setting.order')" class="py-[6px] flex items-center" :class="{ 'text-[#d0011b]' : selected == 'order' }">
                    <i class="bi bi-clipboard2 text-[18px] ml-[8px]"></i>
                    <span class="ml-[14px]">Đơn mua</span>
                </Link>
                <Link :href="route('setting.notice')" class="py-[6px] flex items-center" :class="{ 'text-[#d0011b]' : selected == 'notice' }">
                    <i class="bi bi-bell text-[18px] ml-[8px]"></i>
                    <span class="ml-[12px]">Thông báo</span>
                </Link>
                <Link :href="route('setting.ship')" class="py-[6px] flex items-center" :class="{ 'text-[#d0011b]' : selected == 'ship' }">
                    <i class="bi bi-truck text-[18px] ml-[8px]"></i>
                    <span class="ml-[12px]">Địa chỉ giao hàng</span>
                </Link>
            </template>
        </div>
    </div>
</template>

<script>
import { Link } from '@inertiajs/vue3';

export default {
    components: { Link },
    name: 'UISliderUser',
    emits: ['page-change'],
    props: {
        selected: { type: String, default: 'account' },
        user: { type: Object, default: () => { } },
    },
    methods: {
        checkTab(value) {
            let pathActive = window.location.pathname?.split('/')?.slice(0, 4).join('/')

            return pathActive.includes(value)
        }
    }
}
</script>