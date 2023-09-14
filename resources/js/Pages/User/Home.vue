<template>
    <Head title="Trang chủ"/>
    <AppLayout :isFooter="true">
        <template v-slot:main>
            <div class="main-tab h-[500px]">
                <el-carousel trigger="click" height="30vh" type="card" autoplay :pause-on-hover="true">
                    <el-carousel-item v-for="item in 4" :key="item">
                        <img src="/images/social_icon/google-register.svg" alt="" 
                         class="h-[100%] w-[100%] border-[1px] border-[#000]">
                    </el-carousel-item>
                </el-carousel>
            </div>
            <div class="footer-search mt-[18px]">
                <div class="text-[20px] font-bold">
                    Tìm kiếm nhiều nhất
                </div>
                <ul class="px-[8px] pb-[18px]">
                    <li class="inline-block mr-[24px] mt-[4px]">Báo mới hà nội</li>
                    <li class="inline-block mr-[24px] mt-[4px]">Báo mới hà nội</li>
                    <li class="inline-block mr-[24px] mt-[4px]">Báo mới hà nội</li>
                    <li class="inline-block mr-[24px] mt-[4px]">Báo mới hà nội</li>
                    <li class="inline-block mr-[24px] mt-[4px]">Báo mới hà nội</li>
                    <li class="inline-block mr-[24px] mt-[4px]">Báo mới hà nội</li>
                    <li class="inline-block mr-[24px] mt-[4px]">Báo mới </li>
                    <li class="inline-block mr-[24px] mt-[4px]">Báo mới hà nội</li>
                </ul>
            </div>
        </template>
    </AppLayout>
</template>
<script>
    import { Head, Link, useForm } from '@inertiajs/vue3';
    import AppLayout from '@/Layouts/User/Layout.vue';

    export default {
        components: {
            Head,
            Link,
            AppLayout
        },
        async created() {
        },
        data: function () {
            return {
                user: {
                    email: '',
                    password: ''
                },
                errors: []
            }
        },
        methods: {

        }
    }
</script>
<style>
.form-login {
    border-radius: 5px;
    opacity: 1;
    padding: 2px;
    max-width: 500px;
    background: #fff;
    box-shadow: 0px 3px 6px #00000029;
}

</style>