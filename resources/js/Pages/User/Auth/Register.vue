<template>
    <Head title="Đăng ký tài khoản"/>
    <AppLayout :isFooter="false"/>
    <main>
        <div class="pt-[90px] pb-[80px] flex justify-center items-center">
            <div class="m-auto form-register w-11/12">
                <div class="border-b-[2px] border-[#00000029] px-[30px] py-[18px] text-center text-[#d0011b] font-bold text-[20px]">
                    Đăng ký tài khoản
                </div>
                <div class="w-[100%] md:px-[30px] px-[18px] pt-[24px] pb-[32px]">
                    <el-form 
                        ref="form" :model="formData"
                        :rules="rules" label-position="top"
                        @keyup.enter.prevent="doSubmit()"
                    >
                        <div class="grid grid-cols-2 md:gap-6 gap-4">
                            <el-form-item 
                                label="Họ" prop="first_name"
                                :inline-message="hasError('first_name')"
                                :error="getError('first_name')"
                            >
                                <el-input v-model="formData.first_name" placeholder="Nhập họ"/>
                            </el-form-item>
                            <el-form-item 
                                label="Tên" prop="last_name"
                                :inline-message="hasError('last_name')"
                                :error="getError('last_name')"
                            >
                                <el-input v-model="formData.last_name" placeholder="Nhập tên"/>
                            </el-form-item>
                        </div>
                        <div class="mb-[8px] md:w-[350px] w-[100%]">
                            <el-form-item 
                                label="Địa chỉ" prop="address"
                                :inline-message="hasError('address')"
                                :error="getError('address')"
                            >
                                <el-input v-model="formData.address" placeholder="Nhập địa chỉ"/>
                            </el-form-item>
                        </div>
                        <div class="w-full flex md:gap-6 gap-4">
                            <div class="md:min-w-[160px] w-full">
                                <el-form-item 
                                    label="Giới tính" prop="gender"
                                    :inline-message="hasError('gender')"
                                    :error="getError('gender')"
                                >
                                    <el-select v-model="formData.gender" size="large" placeholder="Giới tính">
                                        <el-option key="1" label="Nam" :value="1"/>
                                        <el-option key="2" label="Nữ" :value="2"/>
                                    </el-select>
                                </el-form-item>
                            </div>
                            <div class="md:min-w-[160px] w-full">
                                <el-form-item 
                                    label="Ngày sinh" prop="birthday"
                                    :inline-message="hasError('birthday')"
                                    :error="getError('birthday')"
                                >
                                    <el-date-picker
                                        v-model="formData.birthday"
                                        type="date" size="large"
                                        placeholder="Nhập ngày sinh"
                                        format="YYYY/MM/DD"
                                        value-format="YYYY/MM/DD"
                                        class="w-[100px]"
                                    />
                                </el-form-item>
                            </div>
                        </div>
                        <div class="md:flex block md:gap-6 gap-4">
                            <div class="md:w-[350px] w-full">
                                <el-form-item 
                                    label="Email" prop="email"
                                    :inline-message="hasError('email')"
                                    :error="getError('email')"
                                >
                                    <el-input v-model="formData.email" size="large" placeholder="Nhập email"/>
                                </el-form-item>
                            </div>
                            <div class="md:w-[350px] w-full">
                                <el-form-item 
                                    label="Số điện thoại" prop="phone_number"
                                    :inline-message="hasError('phone_number')"
                                    :error="getError('phone_number')"
                                >
                                    <el-input v-model="formData.phone_number" size="large" placeholder="Nhập số điện thoại"/>
                                </el-form-item>
                            </div>
                        </div>
                        <div class="md:w-[350px] w-full">
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
                        </div>
                        <div class="mb-[38px] md:w-[350px] w-full">
                            <el-form-item 
                                label="Xác nhận mật khẩu" prop="password_confirmation"
                                :inline-message="hasError('password_confirmation')"
                                :error="getError('password_confirmation')"
                            >
                                <el-input
                                    v-model="formData.password_confirmation"
                                    type="password" size="large"
                                    placeholder="Nhập mật khẩu xác nhận"
                                    show-password
                                />
                            </el-form-item>
                        </div>
                        <div class="flex justify-center">
                            <el-button
                                :loading="loading"
                                type="primary" size="large"
                                class="min-w-[100px]"
                                @click="doSubmit()"
                            >
                                Đăng ký
                            </el-button>
                        </div>
                    </el-form>
                </div>
            </div>
        </div>
    </main>
</template>
<script>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/User/Layout.vue';
import form from '@/Mixins/form';
import axios from 'axios';

export default {
    components: {
        Head,
        Link,
        AppLayout
    },
    mixins: [form],
    data: function () {
        return {
            loading: false,
            formData: this.$inertia.form({
                first_name: null,
                last_name: null,
                address: null,
                gender: null,
                birthday: null,
                email: null,
                phone_number: null,
                password: null,
                password_confirmation: null,
            }),
            rules: {
                first_name: [
                    { required: true, message: 'Trường này là bắt buộc', trigger: ['change', 'blur'] },
                    {
                        max: 255,
                        message: 'Tối đa 255 ký tự',
                        trigger: ['change', 'blur'],
                    },
                ],
                last_name: [
                    { required: true, message: 'Trường này là bắt buộc', trigger: ['change', 'blur'] },
                    {
                        max: 255,
                        message: 'Tối đa 255 ký tự',
                        trigger: ['change', 'blur'],
                    },
                ],
                address: { required: true, message: 'Trường này là bắt buộc', trigger: ['change', 'blur'] },
                gender: { required: true, message: 'Trường này là bắt buộc', trigger: ['change', 'blur'] },
                birthday: { required: true, message: 'Trường này là bắt buộc', trigger: ['change', 'blur'] },
                email: { required: true, message: 'Trường này là bắt buộc', trigger: ['change', 'blur'] },
                phone_number: { required: true, message: 'Trường này là bắt buộc', trigger: ['change', 'blur'] },
                password: { required: true, message: 'Trường này là bắt buộc', trigger: ['change', 'blur'] },
                password_confirmation: { required: true, message: 'Trường này là bắt buộc', trigger: ['change', 'blur'] },
            },
        }
    },
    methods: {
        async submit() {
            // this.loading = true
            this.formData.post(route('store-register'), {
                preserveScroll: true,
                onSuccess: () => {
                    this.loading = false
                },
                onError: (errors) => {
                    this.loading = false
                    this.setErrors(errors)
                    this.$message({
                        message: 'Vui lòng kiểm tra lại thông tin đăng ký',
                        type: 'error',
                        grouping: true
                    })
                },
            })
        },
    }
}
</script>
<style>
.form-register {
    border-radius: 5px;
    opacity: 1;
    padding: 2px;
    max-width: 600px;
    background: #fff;
    box-shadow: 0px 3px 6px #00000029;
}
.form-register .el-input {
    width: 100%;
}

</style>