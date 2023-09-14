<template>
    <header class="relative" style="z-index: 100;">
        <div class="fixed top-0 left-[0px] right-[0px] bg-[#d0011b] text-[#fff] border-b-[2px] border-b-[#fff]">
            <div class="header-menu flex justify-between text-[14px]">
                <div class="header-menu-message flex-1">
                    <Link href="">
                        Message thông báo có sản phẩm mới
                    </Link>
                </div>
                <div class="flex items-center">
                    <Link :href="route('login')">
                        Đăng nhập
                    </Link>
                    <div class="w-[1px] h-[14px] bg-[#fff] mx-[8px]"></div>
                    <Link :href="route('register')">
                        Đăng ký
                    </Link>
                </div>
            </div>
            <div class="h-[50px] md:h-[60px]">
                <div class="header-main">
                    <div class="flex justify-between items-center">
                        <Link :href="route('home')" class="hidden md:block">
                            <div class="flex justify-between items-center">
                                <img src="/images/logo/logo.png" alt="Logo trang web" class="h-[60px]">
                                <div class="w-[2px] h-[24px] bg-[#fff] ml-[4px] mr-[12px]"></div>
                                <div class="uppercase text-[16px]">
                                    Trang bán điện thoại
                                </div>
                            </div>
                        </Link>
                        <div class="block md:hidden" @click="isShowMenu = true">
                            <i class="bi bi-list text-[36px]"></i>
                        </div>
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="hidden w-[400px] mr-[42px] sm:flex">
                            <input type="text" v-model="keyword"
                             class="w-[100%] h-[35px] rounded-l-[4px] text-[14px] text-[#000] border-[#fff]"
                             placeholder="Nhập từ khóa tìm kiếm">
                            <button class="float-right border-[4px] border-[#fff] h-[35px] w-[50px] text-[13px]">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                        <div class="cursor-pointer">
                            <i class="bi bi-cart text-[26px]"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <el-drawer
            v-model="isShowMenu"
            :show-close="true"
            direction="ltr"
            open-delay="100"
            size="100%"
        >
            <template #header="{ close, titleId, titleClass }">
                <h4 :id="titleId" :class="titleClass">
                    Menu
                </h4>
            </template>
            <div>
                <div v-for="menu in listMenu" class="py-[6px] border-b-[1px] border-b-[#00000029]">
                    <Link :href="menu.route" class="flex items-center">
                        <i :class="menu.icon"></i>
                        <span class="mt-[2px]">{{ menu.routeName }}</span>
                    </Link>
                </div>
            </div>
        </el-drawer>
    </header>
    <main>
        <div class="main" :class="{ 'min-h-[70vh]': isFooter }">
            <slot name="main" />
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
                        <Link class="block mt-[4px]">
                            - Điện thoại
                        </Link>
                        <Link class="block mt-[4px]">
                            - Máy tính bảng
                        </Link>
                        <Link class="block mt-[4px]">
                            - Laptop
                        </Link>
                        <Link class="block mt-[4px]">
                            - Phụ kiện điện thoại
                        </Link>
                        <Link class="block mt-[4px]">
                            - Phụ kiện máy tính
                        </Link>
                    </div>
                </div>
                <div class="md:py-[0px] py-[12px]">
                    <Link class="block md:mb-[8px] mb-[4px]">
                        Thông tin về công ty
                    </Link>
                    <Link class="block md:mb-[8px] mb-[4px]">
                        Tuyển dụng
                    </Link>
                    <Link class="block md:mb-[8px] mb-[4px]">
                        Gửi góp ý, liên hệ
                    </Link>
                    <Link class="block md:mb-[8px] mb-[4px]">
                        Chính sách đổi trả
                    </Link>
                    <Link class="block md:mb-[8px] mb-[4px]">
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
        isFooter: { type: Boolean, required: false },
    },
    data() {
        return {
            keyword: '',
            isShowMenu: false,
            listMenu: [
                // {
                //     route: route('login'),
                //     routeName: 'Đăng nhập',
                //     icon: 'bi bi-person text-[22px] mr-[8px]'
                // },
                // {
                //     route: route('login'),
                //     routeName: 'Đăng ký',
                //     icon: 'bi bi-person-add text-[22px] mr-[8px]'
                // },
                {
                    route: route('home'),
                    routeName: 'Trang chủ',
                    icon: 'bi bi-house text-[20px] mr-[8px]'
                },
                {
                    route: route('home'),
                    routeName: 'Giỏ hàng',
                    icon: 'bi bi-cart text-[20px] mr-[8px]'
                },
                {
                    route: route('home'),
                    routeName: 'Cuộc trò chuyện',
                    icon: 'bi bi-chat text-[20px] mr-[8px]'
                },
                {
                    route: route('home'),
                    routeName: 'Danh sách sản phẩm',
                    icon: 'bi bi-phone text-[20px] mr-[8px]'
                },
            ]
        }
    },
    mounted() {
    },
    created() {
    },
    methods: {
    }
}
</script>

<style>
body {
    background-color: #ededed;
}
.header-main {
    height: 100%;
    width: 1000px;
    max-width: 1000px;
    margin: auto;
    padding: 0 12px;
    display: flex;
    justify-content: space-between;
}
header > div {
    box-shadow: 4px 4px 4px #1f1f1f1f;
}
.header-menu {
    width: 1000px;
    max-width: 1000px;
    margin: 0 auto;
    padding: 4px 12px 0 18px;
}
footer .footer-search,
footer .footer-main {
    margin: 0 auto;
    width: 1000px;
    max-width: 1000px;
    margin-bottom: 12px;
}
main .main {
    width: 1000px;
    max-width: 1000px;
    margin: 0 auto;
}
main .main > .main-tab {
    margin-top: 90px;
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
}
.el-drawer__header {
    margin-bottom: 0;
    padding-bottom: 12px;
    border-bottom: 1px solid #000;
}
input:focus {
    border-color: #fff !important;
}
</style>