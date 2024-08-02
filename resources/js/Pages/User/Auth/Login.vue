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
                    <el-form 
                        ref="form" :model="formData"
                        :rules="rules" label-position="top"
                        @keyup.enter.prevent="doSubmit()"
                    >
                        <el-form-item 
                            label="Email" prop="email"
                            :inline-message="hasError('email')"
                            :error="getError('email')"
                        >
                            <el-input
                                v-model="formData.email"
                                size="large"
                                placeholder="Nhập email đăng nhập"
                            />
                        </el-form-item>
                        <el-form-item 
                            label="Mật khẩu" prop="password"
                            :inline-message="hasError('password')"
                            :error="getError('password')"
                        >
                            <el-input
                                v-model="formData.password"
                                type="password" size="large"
                                placeholder="Nhập mật khẩu"
                                show-password
                            />
                        </el-form-item>
                        <div class="mb-[18px]">
                            <Link :href="route('password.request')" class="text-[blue]">
                                Quên mật khẩu?
                            </Link>
                        </div>
                        <div class="flex justify-center">
                            <el-button type="primary" size="large" @click="doSubmit()">
                                Đăng nhập
                            </el-button>   
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
                        <Link :href="route('form-register')">
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
import form from '@/Mixins/form';

export default {
    components: {
        Head,
        Link,
        AppLayout
    },
    mixins: [form],
    data: function () {
        return {
            formData: this.$inertia.form({
                email: null,
                password: null,
                remember: false,
            }),
            rules: {
                email: [
                    { required: true, message: 'Vui lòng nhập email', trigger: ['change', 'blur'] },
                    { type: 'email', message: 'Trường này định dạng là email', trigger: ['change', 'blur'] },
                ],
                password: [
                    { required: true, message: 'Trường này là bắt buộc', trigger: ['change', 'blur'] },
                    { min: 8, message: 'Tối thiểu 8 ký tự',trigger: ['change', 'blur'] },
                    { max: 16, message: 'Tối đa 16 ký tự',trigger: ['change', 'blur'] },
                ],
            },
        }
    },
    methods: {
        async submit() {
            this.formData.post(route('store-login'), {
                preserveScroll: true,
                onSuccess: () => {
                    this.loading = false
                    this.$inertia.visit(route('home'))
                },
                onError: (errors) => {
                    this.loading = false
                    this.setErrors(errors)
                    this.$message({
                        message: 'Vui lòng kiểm tra lại thông tin đăng nhập',
                        type: 'error',
                    })
                },
            })
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