<template>
    <Head title="Quản lý thông tin cá nhân" />
    <AppLayout :isFooter="true">
        <template v-slot:main>
            <div class="main-tab">
                <div class="grid grid-cols-12 gap-4">
                    <Slider :selected="'account'" :user="user" />
                    <div class="sm:col-start-5 lg:col-start-4 col-start-1 col-end-13 bg-[#fff]">
                        <div class="md:px-[24px] px-[18px] py-[24px]">
                            <div class="font-bold pb-[18px] border-b-[1px] border-[#b2b2b2]">
                                <Link :href="route('home')" class="text-[#d0011b]">
                                    Trang chủ
                                </Link>
                                <i class="bi bi-chevron-right mx-[3px]"></i>
                                <span class="ml-[4px]">Thông tin cá nhân</span>
                            </div>
                            <div class="mt-[18px] sm:mx-[24px] mx-[12px]">
                                <div v-if="!isEditProfile" class="mb-[24px]">
                                    <div class="sm:block flex justify-center mb-[24px]">
                                        <img src="/images/devices/phone/dienthoai-1.webp" alt="" class="w-[150px] h-[150px] border-[1px]">
                                    </div>
                                    <div class="flex mb-[18px]">
                                        <div class="sm:w-[150px] w-[auto] sm:mr-[0px] mr-[14px] font-bold">Họ tên:</div>
                                        <div>{{ user.first_name + '' + user.last_name }}</div>
                                    </div>
                                    <div class="flex mb-[18px]">
                                        <div class="sm:w-[150px] w-[auto] sm:mr-[0px] mr-[14px] font-bold">Email đăng nhập:</div>
                                        <div>{{ user.email }}</div>
                                    </div>
                                    <div class="flex mb-[18px]">
                                        <div class="sm:w-[150px] w-[auto] sm:mr-[0px] mr-[14px] font-bold">Số điện thoại:</div>
                                        <div>{{ user.phone }}</div>
                                    </div>
                                    <div class="flex mb-[18px]">
                                        <div class="sm:w-[150px] w-[auto] sm:mr-[0px] mr-[14px] font-bold">Giới tính:</div>
                                        <div>{{ user.gender == 'male' ? 'Name' : 'Nữ' }}</div>
                                    </div>
                                    <div class="flex mb-[18px]">
                                        <div class="sm:w-[150px] w-[auto] sm:mr-[0px] mr-[14px] font-bold">Ngày sinh:</div>
                                        <div>{{ user.birth_day }}</div>
                                    </div>
                                    <div class="flex mb-[18px]">
                                        <div class="sm:min-w-[150px] w-[100px] sm:mr-[0px] mr-[14px] font-bold">Địa chỉ:</div>
                                        <div>Thôn Đồng Trữ, Xã Phú Nghĩa, Huyện Chương Mỹ, Hà Nội</div>
                                    </div>
                                </div>
                                <div v-if="isEditProfile">
                                    <div class="sm:block flex justify-center mb-[24px] cursor-pointer">
                                        <img v-if="imageSelected || userEdit.image" @click="changeImage()"
                                          :src="imageSelected ? imageSelected : userEdit.image" alt=""
                                          class="w-[150px] h-[150px] border-[1px]">
                                        <div v-else @click="changeImage()"
                                          class="w-[150px] h-[150px] border-[1px] border-[#b2b2b2] bg-[#d0011b] text-white
                                          flex items-center justify-center text-[42px]">
                                            {{ userEdit.last_name[0] }}
                                        </div>
                                        <input v-show="false" ref="file" type="file" @change="handleUploadContent"
                                            accept=".jpg,.png,.bmp,.jpeg,.tif,.gif" />
                                    </div>
                                    <div class="grid sm:grid-cols-3 grid-cols-2 sm:gap-6 gap-4">
                                        <div class="mb-[8px]">
                                            <div class="mb-[4px]">Họ <span class="text-[red]">*</span></div>
                                            <el-input v-model="userEdit.first_name" placeholder="Nhập họ"/>
                                            <div v-if="errors.first_name" class="text-[14px] text-[#ff0000]">
                                                {{ errors.first_name }}
                                            </div>
                                        </div>
                                        <div class="mb-[8px]">
                                            <div class="mb-[4px]">Tên <span class="text-[red]">*</span></div>
                                            <el-input v-model="userEdit.last_name" placeholder="Nhập tên"/>
                                            <div v-if="errors.last_name" class="text-[14px] text-[#ff0000]">
                                                {{ errors.last_name }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-[8px] md:w-[400px] w-[100%]">
                                        <div class="mb-[4px]">Địa chỉ</div>
                                        <el-input type="textarea" v-model="userEdit.address" placeholder="Nhập địa chỉ"/>
                                        <div v-if="errors.address" class="text-[14px] text-[#ff0000]">
                                            {{ errors.address }}
                                        </div>
                                    </div>
                                    <div class="md:flex block gap-6">
                                        <div class="mb-[8px] w-[150px]">
                                            <div class="mb-[4px]">Giới tính <span class="text-[red]">*</span></div>
                                            <el-select v-model="userEdit.gender" placeholder="Chọn giới tính">
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
                                                v-model="userEdit.birth_day"
                                                type="date"
                                                format="DD/MM/YYYY"
                                                value-format="DD/MM/YYYY"
                                                placeholder="Nhập ngày sinh"
                                            />
                                            <div v-if="errors.birth_day" class="text-[14px] text-[#ff0000]">
                                                {{ errors.birth_day }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex justify-end my-[32px]">
                                    <div v-if="!isEditProfile" @click="isEditProfile = !isEditProfile"
                                     class="button mb-[4px] mt-[8px] ml-[24px] w-[110px] text-center h-[38px] leading-[38px] border-[1px] text-[white] bg-[#d0011b] cursor-pointer">
                                        Chỉnh sửa
                                    </div>
                                    <div v-if="isEditProfile" class="flex gap-2">
                                        <div @click="cancelChange()"
                                         class="button mb-[4px] mt-[8px] w-[110px] text-center h-[38px] leading-[38px] border-[1px] border-[#b2b2b2] cursor-pointer">
                                            Hủy bỏ
                                        </div>
                                        <div @click="saveChange()"
                                         class="button mb-[4px] mt-[8px] w-[110px] text-center h-[38px] leading-[38px] border-[1px] text-[white] bg-[#d0011b] cursor-pointer">
                                            Lưu
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </AppLayout>
</template>
<script>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/User/Layout.vue';
import Slider from '@/Components/User/Profile/Slider.vue';

export default {
    components: {
        Head,
        Link,
        AppLayout,
        Slider
    },
    async created() {
    },
    data: function () {
        return {
            isEditProfile: false,
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
            userEdit: {
                first_name: 'Nguyễn',
                last_name: 'Viết Thanh',
                email: 'th****oi@gmai.com',
                phone: '09****54',
                gender: 'Nam',
                birth_day: '16/11/2001',
                address: 'Thôn Đồng Trữ, Xã Phú Nghĩa, Huyện Chương Mỹ, Hà Nội',
                image: '/images/devices/phone/dienthoai-1.webp'
            },
            fileImage: '',
            imageSelected: '',
            errors: []
        }
    },
    methods: {
        changeImage() {
            if(this.isEditProfile) { 
                this.$refs.file.click()
            }
        },
        async handleUploadContent(e) {
            try {
                const files = e.target.files || e.dataTransfer.files;
                if (!files.length) return;
                if (files[0].size > 5 * 1024 * 1024) {
                    this.$message.warning(this.$i18n.t('File quá lớn, dung lượng tối đa cho phép 5MB'));
                    return false;
                }

                const nameFile = files[0].name.substring(files[0].name.lastIndexOf('.'));
                const valiFileType = ['.png', '.bmp', '.jpeg', '.tif', '.gif', '.jpg'];
                if (!valiFileType.find((i) => i === nameFile)) {
                    this.$message.warning(
                        this.$i18n.t(`File sai định dạng. Cần thuộc các định dạng sau: `) + valiFileType.join(', ')
                    );

                    return false;
                }
                this.fileImage = files[0]
                this.imageSelected = URL.createObjectURL(files[0])
            } catch (err) {
                console.log('handleUploadContent', err);
            }
        },
        saveChange() {
            this.isEditProfile = false
        },
        cancelChange() {
            this.userEdit = this.user
            this.imageSelected = ''
            this.fileImage = ''
            this.isEditProfile = false
        }
    }
}
</script>
<style>
[type='text']:focus {
    --tw-ring-color: none;
}
.el-select .el-input__wrapper.is-focus {
    box-shadow: 0 0 0 1px black inset !important;
}
</style>