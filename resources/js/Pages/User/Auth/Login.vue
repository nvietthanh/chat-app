<template>
    <Head title="Đăng nhập"/>
    <AppLayout :is-footer="false"/>
    <main>
        <div class="h-screen flex justify-center items-center bg-[#ededed]">
            <div class="m-auto form-login w-11/12">
                <div class="border-b-[2px] border-[#00000029] px-[30px] py-[18px] text-center text-[#d0011b] font-bold text-[20px]">
                    Đăng nhập
                </div>
                <div class="px-[30px] pt-[24px] pb-[32px]">
                    <el-form  @keyup.enter.prevent="login()">
                        <div class="mb-[8px]">
                            <div class="mb-[4px]">Email</div>
                            <el-input v-model="user.email" placeholder="Nhập email đăng nhập" tabindex="1"/>
                            <div v-if="errors.email" class="text-[14px] text-[#ff0000]">
                                {{ errors.email }}
                            </div>
                        </div>
                        <div class="mb-[8px]">
                            <div class="mb-[4px]">Mật khẩu</div>
                            <el-input v-model="user.password" type="password" placeholder="Nhập email đăng nhập" show-password/>
                            <div v-if="errors.password" class="text-[14px] text-[#ff0000]">
                                {{ errors.password }}
                            </div>
                        </div>
                        <div class="mb-[18px]">
                            <Link :href="route('password.request')" class="text-[blue]">
                                Quên mật khẩu?
                            </Link>
                        </div>
                        <div class="flex justify-center">
                            <button type="button" @click="login()" class="px-[14px] py-[6px] rounded-[4px] bg-[#d0011b] text-white">
                                Đăng nhập
                            </button>   
                        </div>
                    </el-form>
                    <div class="mb-[28px]">
                        <div class="flex items-center my-[12px]">
                            <div class="flex-1 h-[1px] bg-[#00000029]"></div>
                            <span class="mx-[12px] text-[14px]">Hoặc</span>
                            <div class="flex-1 h-[1px] bg-[#00000029]"></div>
                        </div>
                        <div class="flex justify-center">
                            <Link class="mr-[6px] px-[14px] py-[4px] rounded-[4px] border-[1px] border-[#000] flex-1">
                                <div class="flex items-center justify-center">
                                    <img src="/images/social_icon/google-register.svg" alt="Logo Google" class="w-[28px]">
                                    <span class="mt-[2px]">Google</span>
                                </div>
                            </Link>
                            <Link class="ml-[6px] px-[14px] py-[4px] rounded-[4px] border-[1px] border-[#000] flex-1">
                                <div class="flex items-center justify-center mt-[2px]">
                                    <img src="/images/social_icon/facebook_icon.svg.webp" alt="Logo Google" class="w-[22px]">
                                    <span class="mt-[2px] ml-[4px]">Facebook</span>
                                </div>
                            </Link>
                        </div>
                    </div>
                    <div class="flex justify-center">
                        <Link :href="route('register')">
                            Bạn chưa có tài khoản? <span class="text-[#d0011b]">Đăng ký</span>
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    </main>
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
                if (!(this.user.password && this.user.password.trim())) {
                    validate = false
                    this.errors.password = "Vui lòng nhập mật khẩu"
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
    max-width: 400px;
    background: #fff;
    box-shadow: 0px 3px 6px #00000029;
}

</style>