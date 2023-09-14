<template>
    <Head title="Quản lý thông tin cá nhân" />
    <AppLayout :isFooter="true">
        <template v-slot:main>
            <div class="main-tab">
                <div class="grid grid-cols-12 gap-4">
                    <Slider :selected="'ship'" :user="user" />
                    <div class="sm:col-start-5 lg:col-start-4 col-start-1 col-end-13 bg-[#fff]">
                        <div class="md:px-[24px] px-[18px] py-[24px]">
                            <div class="font-bold pb-[18px] border-b-[1px] border-[#b2b2b2]">
                                <Link :href="route('home')" class="text-[#d0011b]">
                                    Trang chủ
                                </Link>
                                <i class="bi bi-chevron-right mx-[3px]"></i>
                                <span class="ml-[4px]">Địa chỉ giao hàng</span>
                            </div>
                            <div class="mt-[18px] mx-[12px]">
                                <div v-for="item in 4" class="sm:flex block items-center justify-between border-b-[1px] pb-[18px] mb-[24px]">
                                    <div>
                                        <div class="flex gap-4">
                                            <div class="font-bold">Nguyễn Viết Thanh</div>
                                            <div class="w-[2px] bg-[#bebebe]"></div>
                                            <div>0358387102</div>
                                        </div>
                                        <div class="mt-[8px]">
                                            Thôn Đồng Trữ, Phú Nghĩa, Chương Mỹ, Hà Nội
                                        </div>
                                        <div class="mt-[8px] w-[100px] cursor-pointer text-[#d0011b] py-[4px] border-[1px] border-[#d0011b] text-center">
                                            Mặc định
                                        </div>
                                    </div>
                                    <div>
                                        <div class="flex justify-end gap-4">
                                            <div @click="updateAddress()" class="button cursor-pointer text-[blue]">
                                                Chỉnh sửa
                                            </div>
                                            <div @click="deleteAddress()" class="button cursor-pointer text-[blue]">
                                                Xóa
                                            </div>
                                        </div>
                                        <div class="flex justify-end">
                                            <div @click="setDefault()" class="button mt-[8px] w-[150px] text-center text-[#d0011b] py-[6px] border-[1px] border-[#bebebe]">
                                                Thiết lập mặc định
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <EditAdressForm ref="editShipForm" @change-post="fetchData"/>
        </template>
    </AppLayout>
</template>
<script>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/User/Layout.vue';
import Slider from '@/Components/User/Profile/Slider.vue';
import EditAdressForm from './Ship/EditForm.vue'
import { ElMessage, ElMessageBox } from 'element-plus'

export default {
    components: {
        Head,
        Link,
        AppLayout,
        Slider,
        EditAdressForm
    },
    async created() {
    },
    data: function () {
        return {
            user: {
                first_name: 'Nguyễn',
                last_name: 'Viết Thanh',
                email: 'th****oi@gmai.com',
                phone: '09****54',
                gender: 'Nam',
                birth_day: '16/11/2001',
                address: 'Thôn Đồng Trữ, Xã Phú Nghĩa, Huyện Chương Mỹ, Hà Nội',
                image: '/images/devices/phone/dienthoai-1.webp'
            },
        }
    },
    methods: {
        updateAddress() {
            this.$refs.editShipForm.open()
        },
        deleteAddress() {
            ElMessageBox.confirm(
                'Bạn có muốn xóa địa chỉ giao hàng này không?',
                'Thông báo',
                {
                    confirmButtonText: 'Xác nhận',
                    cancelButtonText: 'Hủy bỏ',
                    type: 'warning',
                }
            )
            .then(() => {
                ElMessage({
                    type: 'success',
                    message: 'Xóa thành công',
                })
            })
            .catch(() => {})
        },
        setDefault() {
            alert(1)
        }
    }
}
</script>
<style>
[type='text']:focus {
    --tw-ring-color: none !important;
}
.el-select .el-input__wrapper.is-focus {
    box-shadow: 0 0 0 1px black inset !important;
}
</style>