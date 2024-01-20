<template>
    <div id="header" class="fixed top-0 left-[0px] right-[0px] bg-[#d0011b] text-[#fff] border-b-[2px] border-b-[#fff]">
        <div class="header-menu flex justify-between items-center text-[14px]">
            <div class="header-menu-message flex-1">
                <Link href="">
                    Message thông báo có sản phẩm mới bạn tìm xem
                </Link>
            </div>
            <div class="flex items-center button">
                <!-- <div class="flex items-center">
                    <Link :href="route('login')">
                        Đăng nhập
                    </Link>
                    <div class="w-[1px] h-[14px] bg-[#fff] mx-[8px]"></div>
                    <Link :href="route('register')">
                        Đăng ký
                    </Link>
                </div> -->
                <div id="header-menu" class="relative cursor-pointer">
                    <div class="flex items-center">
                        <i class="bi bi-person text-[18px]"></i>
                        <span class="ml-[4px]">Nguyễn Viết Thanh</span>
                    </div>
                    <div id="list-menu" class="text-[#000] w-[215px]">
                        <div class="px-[12px] py-[8px]">
                            <Link :href="route('cart')" class="py-[4px] flex items-center">
                                <i class="bi bi-cart text-[20px] ml-[8px]"></i>
                                <span class="ml-[12px]">Giỏ hàng</span>
                            </Link>
                            <Link :href="route('setting.profile')" class="py-[4px] flex items-center">
                                <i class="bi bi-person text-[20px] ml-[8px]"></i>
                                <span class="ml-[12px]">Thông tin cá nhân</span>
                            </Link>
                            <Link :href="route('setting.order')" class="py-[4px] flex items-center">
                                <i class="bi bi-bag text-[18px] ml-[8px]"></i>
                                <span class="ml-[12px]">Quản lý đơn hàng</span>
                            </Link>
                            <Link :href="route('maker.purchase-order')" class="py-[4px] flex items-center">
                                <i class="bi bi-shop text-[18px] ml-[8px]"></i>
                                <span class="ml-[12px]">Quản lý trang bán hàng</span>
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="h-[50px] md:h-[60px]">
            <div class="header-main">
                <div class="flex justify-between items-center mr-[12px]">
                    <Link :href="route('home')" class="hidden md:block">
                        <div class="flex justify-between items-center">
                            <img src="/images/logo/logo.png" alt="Logo trang web" class="h-[60px]">
                            <div class="lg:block hidden w-[2px] h-[24px] bg-[#fff] ml-[4px] mr-[12px]"></div>
                            <div class="lg:block hidden uppercase text-[16px]">
                                Trang bán điện thoại
                            </div>
                        </div>
                    </Link>
                    <div class="block md:hidden" @click="isShowMenu = true">
                        <i class="bi bi-list text-[36px]"></i>
                    </div>
                </div>
                <div class="flex justify-between items-center">
                    <div class="sm:w-[500px] lg:w-[400px] sm:mr-[32px] flex">
                        <input type="text" v-model="keyword" @keypress.prevent.enter="search()"
                            class="w-[100%] h-[35px] rounded-l-[4px] text-[14px] text-[#000] border-[#fff]"
                            placeholder="Nhập từ khóa tìm kiếm">
                        <button @click="search()" class="float-right border-[4px] border-[#fff] h-[35px] w-[50px] text-[13px]">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                    <div id="notice-icon" class="relative lg:mr-[12px]">
                        <div class="cursor-pointer px-[12px] flex justify-center relative">
                            <i class="bi bi-bell text-[26px]"></i>
                            <div class="text-[13px] absolute bottom-[50%] flex items-center justify-center right-0 w-[24px] h-[20px] text-[#d0011b] bg-[#fff] rounded-[50%]">
                                1
                            </div>
                        </div>
                        <div id="form-notice" class="py-[12px] text-[#000]">
                            <div class="px-[18px] pb-[8px] border-b-[1px] border-[#b2b2b2]">
                                Thông báo
                            </div>
                            <div class="list-notice">
                                <div id="list-notice-all">
                                    <div v-for="item in 6" class="px-[18px] py-[12px] flex">
                                        <div class="flex items-center">
                                            <img src="/images/devices/phone/dienthoai-1.webp" alt="" class="w-[50px] h-[50px]">
                                            <div class="hidden-two-line ml-[8px] sm:mr-[24px] mr-[4px]">
                                                Thông báo đơn hàng đang trong quá trình vận chuyển
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex justify-center">
                                    <Link :href="route('setting.notice')"
                                        class="button mb-[4px] mt-[8px] w-[140px] text-center h-[34px] leading-[34px] border-[1px] text-[white] bg-[#d0011b]">
                                        Xem tất cả
                                    </Link>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="cart-icon" class="relative">
                        <div class="cursor-pointer px-[12px] relative">
                            <i class="bi bi-cart text-[26px]"></i>
                            <div class="text-[13px] absolute bottom-[50%] flex items-center justify-center right-0 w-[24px] h-[20px] text-[#d0011b] bg-[#fff] rounded-[50%]">
                                {{ this.$page.props.product_cart.length }}
                            </div>
                        </div>
                        <div id="cart-products" class="py-[12px] text-[#000]">
                            <div class="px-[18px] pb-[8px] border-b-[1px] border-[#b2b2b2]">
                                Giỏ hàng
                            </div>
                            <div class="list-cart">
                                <div id="list-cart-product">
                                    <div v-for="product in this.$page.props.product_cart" class="px-[18px] py-[12px] flex">
                                        <Link :href="route('product', 1)">
                                            <img :src="product.image" alt="" class="w-[50px] h-[50px] border-[1px]">
                                        </Link>
                                        <div class="ml-[12px] flex-1">
                                            <div class="flex justify-between">
                                                <Link :href="route('product', 1)">
                                                    <div class="hidden-two-line">
                                                        {{ product.product_name }}
                                                    </div>
                                                </Link>
                                                <div class="ml-[18px] text-[14px]">
                                                    <div class="text-[#d0021c]">{{ formatPrice(product.price) }}</div>
                                                    <div class="mt-[2px]">x{{ product.quality }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex justify-end">
                                    <Link :href="route('cart')"
                                        class="button mb-[4px] mt-[8px] mr-[32px] w-[120px] text-center h-[38px] leading-[38px] border-[1px] text-[white] bg-[#d0011b]">
                                        Xem giỏ hàng
                                    </Link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <el-drawer
        v-model="isShowMenu"
        show-close
        direction="ltr"
        size="100%"
    >
        <template #header="{ titleId, titleClass }">
            <h4 :id="titleId" :class="titleClass">
                Menu
            </h4>
        </template>
        <div>
            <div v-for="(menu, index) in listMenu" :key="index"
                class="py-[6px] border-b-[1px] border-b-[#00000029]">
                <Link v-if="!menu.routeList" :href="menu.route" class="flex items-center">
                    <i :class="menu.icon"></i>
                    <span class="mt-[2px]">{{ menu.routeName }}</span>
                </Link>
                <el-menu
                    v-else
                    @open="handleOpen"
                    @close="handleClose"
                >
                    <el-sub-menu index="1">
                        <template #title>
                            <div class="flex items-center">
                                <i :class="menu.icon"></i>
                                <span class="mt-[2px]">{{ menu.routeName }}</span>
                            </div>
                        </template>
                        <el-menu-item index="1" v-for="(subMenu, index) in menu.routeList" :key="index">
                            <Link :href="subMenu.route" class="flex items-center">
                                <!-- <i :class="subMenu.icon"></i> -->
                                <span class="mt-[2px]">{{ subMenu.routeName }}</span>
                            </Link>
                        </el-menu-item>
                    </el-sub-menu>
                </el-menu>
            </div>
        </div>
    </el-drawer>
</template>

<script>
import { Link } from '@inertiajs/vue3'
import price from '@/Lib/price'
import { Menu } from '@/Store/Const/menu'

export default {
    mixins: [price],
    components: {
        Link
    },
    data() {
        return {
            keyword: '',
            isShowMenu: false,
            listMenu: Menu
        }
    },
    created() {
        let uri = window.location.search.substring(1); 
        let params = new URLSearchParams(uri);
        if(route('search').search(window.location.pathname)) {
            this.keyword = params.get("keyword")
        }
    },
    methods: {
        search() {
            const pagram = { ...{
                keyword: this.keyword
            }}

            this.$inertia.visit(route('search', pagram))
        },
        addCart() {
            alert(1)
        },
    }
}
</script>