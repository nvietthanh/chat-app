<template>
    <Head title="Đăng ký tài khoản"/>
    <AppLayout :isFooter="false"/>
    <main>
        <div class="pt-[90px] pb-[80px] flex justify-center items-center">
            <div class="m-auto form-register w-11/12">
                <div class="border-b-[2px] border-[#00000029] px-[30px] py-[18px] text-center text-[#d0011b] font-bold text-[20px]">
                    Đăng ký tài khoản
                </div>
                <div class="w-[100%] px-[30px] pt-[24px] pb-[32px]">
                    <el-form  @keyup.enter.prevent="register()">
                        <div class="grid grid-cols-2 gap-6">
                            <div class="mb-[8px]">
                                <div class="mb-[4px]">Họ <span class="text-[red]">*</span></div>
                                <el-input v-model="user.first_name" placeholder="Nhập họ"/>
                                <div v-if="errors.first_name" class="text-[14px] text-[#ff0000]">
                                    {{ errors.first_name }}
                                </div>
                            </div>
                            <div class="mb-[8px]">
                                <div class="mb-[4px]">Tên <span class="text-[red]">*</span></div>
                                <el-input v-model="user.last_name" placeholder="Nhập tên"/>
                                <div v-if="errors.last_name" class="text-[14px] text-[#ff0000]">
                                    {{ errors.last_name }}
                                </div>
                            </div>
                        </div>
                        <div class="mb-[8px] md:w-[350px] w-[100%]">
                            <div class="mb-[4px]">Địa chỉ</div>
                            <el-input v-model="user.address" placeholder="Nhập địa chỉ"/>
                            <div v-if="errors.address" class="text-[14px] text-[#ff0000]">
                                {{ errors.address }}
                            </div>
                        </div>
                        <div class="md:flex block gap-6">
                            <div class="mb-[8px] w-[180px]">
                                <div class="mb-[4px]">Giới tính <span class="text-[red]">*</span></div>
                                <el-select v-model="user.gender" placeholder="Chọn giới tính">
                                    <el-option key="1" label="Nam" value="male"/>
                                    <el-option key="2" label="Nữ" value="female"/>
                                </el-select>
                                <div v-if="errors.gender" class="text-[14px] text-[#ff0000]">
                                    {{ errors.gender }}
                                </div>
                            </div>
                            <div class="mb-[8px]">
                                <div class="mb-[4px]">Ngày sinh <span class="text-[red]">*</span></div>
                                <el-date-picker
                                    v-model="user.birth_day"
                                    type="date"
                                    placeholder="Nhập ngày sinh"
                                />
                                <div v-if="errors.birth_day" class="text-[14px] text-[#ff0000]">
                                    {{ errors.birth_day }}
                                </div>
                            </div>
                        </div>
                        <div class="md:flex block gap-6">
                            <div class="mb-[8px] md:w-[400px] w-[100%]">
                                <div class="mb-[4px]">Email <span class="text-[red]">*</span></div>
                                <el-input v-model="user.email" placeholder="Nhập email" tabindex="1"/>
                                <div v-if="errors.email" class="text-[14px] text-[#ff0000]">
                                    {{ errors.email }}
                                </div>
                            </div>
                            <div class="mb-[8px] md:w-[250px] w-[200px]">
                                <div class="mb-[4px]">Số điện thoại <span class="text-[red]">*</span></div>
                                <el-input v-model="user.phone_number" placeholder="Nhập số điện thoại" tabindex="1"/>
                                <div v-if="errors.phone_number" class="text-[14px] text-[#ff0000]">
                                    {{ errors.phone_number }}
                                </div>
                            </div>
                        </div>
                        <div class="mb-[8px] w-[180px]">
                                <div class="mb-[4px]">Mật khẩu <span class="text-[red]">*</span></div>
                                <el-input v-model="user.password" type="password" placeholder="Nhập mật khẩu" show-password/>
                                <div v-if="errors.password" class="text-[14px] text-[#ff0000]">
                                    {{ errors.password }}
                                </div>
                            </div>
                        <div class="mb-[38px] w-[180px]">
                            <div class="mb-[4px]">Xác nhận mật khẩu <span class="text-[red]">*</span></div>
                            <el-input v-model="user.confirm_password" type="password" placeholder="Nhập mật khẩu xác nhận" show-password/>
                            <div v-if="errors.confirm_password" class="text-[14px] text-[#ff0000]">
                                {{ errors.confirm_password }}
                            </div>
                        </div>
                        <div class="flex justify-center">
                            <button type="button" @click="register()" class="px-[14px] py-[6px] rounded-[4px] bg-[#d0011b] text-white">
                                Đăng ký
                            </button>
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
                    first_name: '',
                    last_name: '',
                    address: '',
                    gender: '',
                    birth_day: '',
                    email: '',
                    phone_number: '',
                    password: '',
                    confirm_password: '',
                },
                errors: []
            }
        },
        methods: {
            async register() {
                this.errors = []
                if(this.validateUser()) {
                    
                }
            },
        }
    }
</script>
<style>
.form-register {
    border-radius: 5px;
    opacity: 1;
    padding: 2px;
    max-width: 500px;
    background: #fff;
    box-shadow: 0px 3px 6px #00000029;
}

</style>