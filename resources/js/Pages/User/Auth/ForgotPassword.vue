<template>
    <Head title="Đăng nhập"/>
    <AppLayout :isFooter="false"/>
    <div class="h-screen flex justify-center items-center bg-[#ededed]">
        <div class="m-auto form-login w-11/12">
            <div class="border-b-[2px] border-[#00000029] px-[30px] py-[18px] text-center text-[#d0011b] font-bold text-[20px]">
                Quên mật khẩu
            </div>
            <div class="px-[30px] pt-[24px] pb-[32px]">
                <el-form  @keyup.enter.prevent="login()">
                    <div class="text-[15px]">
                        Vui lòng nhập địa chỉ email của bạn và chúng tôi sẽ gửi cho bạn liên kết đặt lại mật khẩu qua email để cho phép bạn thay đổi mật khẩu.
                    </div>
                    <div class="mb-[42px] mt-[18px]">
                        <div class="mb-[4px]">Email</div>
                        <el-input v-model="user.email" placeholder="Nhập email đăng nhập" />
                        <div v-if="errors.email" class="mt-[2px] text-[14px] text-[#ff0000]">
                            {{ errors.email }}
                        </div>
                    </div>
                    <div class="flex justify-center">
                        <button type="button" @click="login()" class="px-[14px] py-[6px] rounded-[4px] bg-[#d0011b] text-white">
                            Xác nhận
                        </button>
                    </div>
                </el-form>
            </div>
        </div>
    </div>
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
                },
                errors: [   ]
            }
        },
        methods: {
            validateUser() {
                let validate = true;
                if (!(this.user.email && this.user.email.trim())) {
                    validate = false
                    this.errors.email = "Vui lòng nhập email"
                } else if (!this.validateEmail(this.user.email)) {
                    validate = false
                    this.errors.email = "Email không đúng định dạng"
                }
                return validate
            },
            validateEmail(email) {
                let validEmail = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
                if (email.match(validEmail)) {
                    return true
                } else {
                    return false
                }
            },
            async login() {
                this.errors = []
                if(this.validateUser()) {
                    
                }
            },
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