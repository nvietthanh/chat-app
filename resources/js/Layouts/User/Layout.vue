<template>
    <header class="relative" style="z-index: 100;">
        <div id="header" class="fixed top-0 left-[0px] right-[0px] bg-[#d0011b] text-[#fff] border-b-[2px] border-b-[#fff]">
            <div class="header-menu flex justify-between items-center text-[14px]">
                <div class="header-menu-message flex-1">
                    <Link href="">
                        Message thông báo có sản phẩm mới bạn tìm xem
                    </Link>
                </div>
                <div class="flex items-center">
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
            <template #header="{ close, titleId, titleClass }">
                <h4 :id="titleId" :class="titleClass">
                    Menu
                </h4>
            </template>
            <div>
                <div v-for="menu in listMenu" class="py-[6px] border-b-[1px] border-b-[#00000029]">
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
                            <el-menu-item index="1" v-for="subMenu in menu.routeList">
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
    </header>
    <main>
        <div class="main" :class="{ 'min-h-[70vh]': isFooter }">
            <slot name="main"/>
        </div>
    </main>
    <footer v-if="isFooter" class="bg-[#d0011b]">
        <div class="py-[18px] mb-[2px]">
            <div class="footer-main text-white md:grid md:grid-cols-4">
                <div class="md:py-[0px] py-[12px]">
                    <div class="uppercase">
                        Danh sách sản phẩm
                    </div>
                    <div>
                        <Link :href="route('home')" class="block mt-[4px]">
                            - Điện thoại
                        </Link>
                        <Link :href="route('home')" class="block mt-[4px]">
                            - Máy tính bảng
                        </Link>
                        <Link :href="route('home')" class="block mt-[4px]">
                            - Laptop
                        </Link>
                        <Link :href="route('home')" class="block mt-[4px]">
                            - Phụ kiện điện thoại
                        </Link>
                        <Link :href="route('home')" class="block mt-[4px]">
                            - Phụ kiện máy tính
                        </Link>
                    </div>
                </div>
                <div class="md:py-[0px] py-[12px]">
                    <Link :href="route('home')" class="block md:mb-[8px] mb-[4px]">
                        Thông tin về công ty
                    </Link>
                    <Link :href="route('home')" class="block md:mb-[8px] mb-[4px]">
                        Tuyển dụng
                    </Link>
                    <Link :href="route('home')" class="block md:mb-[8px] mb-[4px]">
                        Gửi góp ý, liên hệ
                    </Link>
                    <Link :href="route('home')" class="block md:mb-[8px] mb-[4px]">
                        Chính sách đổi trả
                    </Link>
                    <Link :href="route('home')" class="block md:mb-[8px] mb-[4px]">
                        Chính sách bảo mật
                    </Link>
                </div>
                <div class="md:py-[0px] py-[12px]">
                    <div class="md:mb-[8px] mb-[4px]">
                        Tổng đài hỗ trợ (Miễn phí gọi)
                    </div>
                    <div class="md:mb-[8px] mb-[4px]">
                        Gọi mua: 1800.1060 (7:30 - 22:00)
                    </div>
                    <div class="md:mb-[8px] mb-[4px]">
                        Khiếu nại: 800.1062 (8:00 - 21:30)
                    </div>
                    <div class="md:mb-[8px] mb-[4px]">
                        Bảo hành: 1800.1064 (8:00 - 21:00)
                    </div>
                </div>
                <div class="md:py-[0px] py-[12px]">
                    <div class="md:mb-[8px] mb-[4px]">
                        Nền tảng mạng xã hội
                    </div>
                </div>
            </div>
        </div>
    </footer>
</template>

<script>
import { Link } from '@inertiajs/vue3'

export default {
    components: {
        Link,
    },
    props: {
        isFooter: { type: Boolean },
    },
    data() {
        return {
            keyword: '',
            isShowMenu: false,
            listMenu: [
                {
                    route: route('home'),
                    routeName: 'Trang chủ',
                    icon: 'bi bi-house text-[20px] mr-[8px]'
                },
                {
                    route: '',
                    routeName: 'Danh mục sản phẩm',
                    icon: 'bi bi-list-ul text-[22px] mt-[2px] mr-[8px]',
                    routeList: [
                        {
                            route: route('home'),
                            routeName: 'Quần áo Nam'
                        },
                        {
                            route: route('home'),
                            routeName: 'Quần áo Nữ'
                        },
                        {
                            route: route('home'),
                            routeName: 'Điện thoại'
                        },
                    ]
                },
                {
                    route: route('cart'),
                    routeName: 'Giỏ hàng',
                    icon: 'bi bi-cart text-[20px] mr-[8px]'
                },
                {
                    route: route('home'),
                    routeName: 'Cuộc trò chuyện',
                    icon: 'bi bi-chat text-[20px] mr-[8px]'
                },
                {
                    route: '',
                    routeName: 'Quản lý tài khoản',
                    icon: 'bi bi-gear text-[20px] mr-[8px]',
                    routeList: [
                        {
                            route: route('setting.profile'),
                            routeName: 'Quản lý thông tin cá nhân'
                        },
                        {
                            route: route('setting.order'),
                            routeName: 'Đơn mua'
                        },
                        {
                            route: route('setting.notice'),
                            routeName: 'Thông báo'
                        },
                        {
                            route: route('setting.ship'),
                            routeName: 'Địa chỉ giao hàng'
                        },
                    ]
                },
            ]
        }
    },
    mounted() {
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
        formatPrice(price) {
            return price.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' })
        },
    }
}
</script>

<style>
body {
    background-color: #ededed;
}
.header-main {
    height: 100%;
    width: 1100px;
    max-width: 1100px;
    margin: auto;
    padding: 0 12px;
    display: flex;
    justify-content: space-between;
}
header > #header {
    box-shadow: 4px 4px 4px #1f1f1f1f;
}
.header-menu {
    width: 1100px;
    max-width: 1100px;
    margin: 0 auto;
    padding: 4px 12px 0 18px;
}
.header-main input[type="text"] {
    --tw-ring-color: none;
}
footer .footer-search,
footer .footer-main {
    margin: 0 auto;
    width: 1100px;
    max-width: 1100px;
    margin-bottom: 12px;
}
main .main {
    width: 1100px;
    max-width: 1100px;
    margin: 0 auto;
}
main .main > .main-tab {
    margin-top: 100px;
    margin-bottom: 16px;
}
.el-drawer__body {
    padding: 8px 18px;
    overflow-y: scroll;
}
.header-menu-message {
    overflow: hidden;
    text-overflow: ellipsis;
    -webkit-line-clamp: 1;
    display: -webkit-box;
    -webkit-box-orient: vertical;
}
.el-drawer__header {
    margin-bottom: 0;
    padding-bottom: 12px;
    border-bottom: 1px solid #000;
}
input:focus {
    border-color: #fff !important;
}
.el-menu {
    border: none !important;
}
.el-sub-menu__title,
.el-menu-item {
    height: 36px !important;
    line-height: normal !important;
}
.el-sub-menu__title {
    padding-left: 0 !important;
}
.el-menu-item {
    padding-left: 30px !important;
}
#cart-products {
    display: none;
    position: absolute;
    top: calc(100% + 6px);
    right: 0;
    background-color: #fff;
    box-shadow: 4px 4px 4px #1f1f1f1f;
    border: 1px solid #b2b2b2;
    border-radius: 4px;
}
#cart-products::before {
    position: absolute;
    right: 14px;
    bottom: 100%;;
    content: "";
    border-left: 10px solid transparent;
    border-right: 10px solid transparent;
    border-bottom: 10px solid #fff;
}
#cart-products::after {
    position: absolute;
    content: "";
    bottom: 100%;
    right: 0;
    height: 20px;
    width: 80px;
}
#list-cart-product {
    width: 450px;
    max-height: 300px;
    overflow-y: scroll;
}
#cart-icon:hover #cart-products{
    display: block;
}
#form-notice {
    display: none;
    position: absolute;
    top: calc(100% + 6px);
    right: 0;
    background-color: #fff;
    box-shadow: 4px 4px 4px #1f1f1f1f;
    border: 1px solid #b2b2b2;
    border-radius: 4px;
}
#form-notice::after {
    position: absolute;
    content: "";
    bottom: 100%;
    right: 0;
    height: 20px;
    width: 80px;
}
#form-notice::before {
    position: absolute;
    right: 14px;
    bottom: 100%;;
    content: "";
    border-left: 10px solid transparent;
    border-right: 10px solid transparent;
    border-bottom: 10px solid #fff;
}
#list-notice-all {
    width: 450px;
    max-height: 300px;
    overflow-y: scroll;
}
#notice-icon:hover #form-notice{
    display: block;
}
#notice-icon:hover #form-notice{
    display: block;
}
#list-menu {
    display: none;
    position: absolute;
    top: calc(100% + 6px);
    right: 0;
    background-color: #fff;
    box-shadow: 4px 4px 4px #1f1f1f1f;
    border: 1px solid #b2b2b2;
    border-radius: 4px;
    animation: infinite;
    z-index: 1000;
}
#list-menu::after {
    position: absolute;
    content: "";
    bottom: 100%;
    right: 0;
    height: 20px;
    width: 100%;
}
#list-menu::before {
    position: absolute;
    right: 16px;
    bottom: 100%;;
    content: "";
    border-left: 10px solid transparent;
    border-right: 10px solid transparent;
    border-bottom: 10px solid #fff;
}
#header-menu:hover #list-menu{
    display: block;
}
@media only screen and (max-width: 1024px) {
    .header-menu,
    .header-main,
    .main,
    .footer-search,
    .footer-main{
        padding: 0 12px 0 8px;
        width: 100% !important;
    }
    .header-menu {
        padding-top: 8px;
    }
    .main,
    .footer-search,
    .footer-main {
        padding: 0 8px;
    }
    #form-notice {
        right: -50px;
    }
    #form-notice::before {
        right: 64px;
    }
}
@media only screen and (max-width: 576px) {
    main .main > .main-tab {
        margin-top: 90px;
    }
    #list-cart-product {
        width: calc(100vw - 25px);
    }
    #list-notice-all {
        width: calc(100vw - 25px);
    }
    #header-menu:hover #list-menu{
        display: none;
    }
}
</style>