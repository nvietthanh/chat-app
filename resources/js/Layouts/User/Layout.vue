<template>
    <header v-if="isHeader" class="relative" style="z-index: 100;">
        <Header />
    </header>
    <main>
        <div class="main" :class="{ 'min-h-[70vh]': isFooter }">
            <div class="main-tab">
                <slot name="main"/>
            </div>
        </div>
    </main>
    <footer v-if="isFooter" class="bg-[#d0011b]">
        <Footer />
    </footer>
</template>

<script>
import { Link } from '@inertiajs/vue3'
import Header from '@/Layouts/User/Header.vue'
import Footer from '@/Layouts/User/Footer.vue'

export default {
    components: {
        Link, Header, Footer
    },
    props: {
        isFooter: { type: Boolean, default: true },
        isHeader: { type: Boolean, default: true },
    },
    data() {
        return {
        }
    },
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
#mobile-menu .el-drawer__body {
    padding: 0;
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