<template>
    <el-dialog v-model="dialogVisible" id="edit-address-pay"
     class="bg-[#fff] max-h-[90%] sm:min-w-[450px] sm:max-w-[450px] min-w-[95%] mt-[32px]"
     :show-close="true">
        <template #header>
            <div class="text-center font-bold text-[18px] text-[#d0011b]">
                {{ tab == "tab_1" ? "Chọn địa chỉ giao hàng" : "Thêm địa chỉ mới" }}
            </div>
        </template>
        <div class="overflow-scroll max-h-[400px] min-h-[300px] pb-[32px]">
            <div v-if="tab == 'tab_1'" class="px-[12px] py-[8px] sm:mx-[12px]">
                <el-radio-group v-model="dataForm.is_notice" size="large">
                    <el-radio v-for="item in 3" label="1" size="large">
                        <div class="flex">
                            <span class="font-bold">Nguyễn Viết Thanh</span>
                            <span class="mx-[8px]">-</span>
                            <span>0358387102</span>
                        </div>
                        <div class="mt-[4px]">
                            Thôn Đồng Trữ, Phú Nghĩa, Chương Mỹ, Hà Nội
                        </div>
                    </el-radio>
                </el-radio-group>
                <div class="mt-[24px]">
                    <div @click="tab = 'tab_2'"
                     class="cursor-pointer border-[1px] border-[#bebebe] py-[6px] w-[160px] flex items-center justify-center">
                        <i class="bi bi-plus-circle text-[16px] mr-[6px]"></i>
                        Thêm địa chỉ mới
                    </div>
                </div>
            </div>
            <div id="add-address" v-else class="py-[8px] px-[24px] w-[100%]">
                <div>
                    <div class="grid sm:grid-cols-2 grid-cols-1 sm:gap-6 gap-3">
                        <div class="mb-[8px] sm:w-[auto] w-[250px]">
                            <div class="mb-[4px]">Họ tên <span class="text-[red]">*</span></div>
                            <el-input v-model="dataForm.first_name" placeholder="Nhập họ tên người nhận"/>
                            <div v-if="errors.first_name" class="text-[14px] text-[#ff0000]">
                                {{ errors.first_name }}
                            </div>
                        </div>
                        <div class="mb-[8px] sm:w-[auto] w-[160px]">
                            <div class="mb-[4px]">Số điện thoại <span class="text-[red]">*</span></div>
                            <el-input v-model="dataForm.last_name" placeholder="Nhập số điện thoại"/>
                            <div v-if="errors.last_name" class="text-[14px] text-[#ff0000]">
                                {{ errors.last_name }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-[18px]">
                    <div class="mb-[4px]">Địa chỉ giao hàng <span class="text-[red]">*</span></div>
                    <el-input type="textarea" class="mt-[2px]" v-model="dataForm.title" placeholder="Nhập tiêu đề" clearable/>
                    <div v-if="errors.title" class="mt-[5px] text-[#ff0000]">
                        {{ errors.title[0] }}
                    </div>
                </div>
                <div class="mt-[18px]">
                    <div class="mb-[4px]">Loại địa chỉ</div>
                    <el-radio-group v-model="dataForm.is_notice" size="large">
                        <el-radio label="1" size="large" border>Nhà riêng</el-radio>
                        <el-radio label="0" size="large" border>Văn phòng</el-radio>
                    </el-radio-group>
                </div>
            </div>
        </div>
        <template #footer>
            <div class="mb-[12px]">
                <div v-if="tab == 'tab_1'" class="flex justify-end text-[14px] mr-[24px]">
                    <div @click="cancel"
                        class="cursor-pointer flex justify-center items-center w-[110px] rounded-[4px] bg-[#ffffff] py-[4px] h-[32px] text-[15px] text-black border border-[#7d7f92]">
                        Hủy bỏ
                    </div>
                    <div class="cursor-pointer flex justify-center items-center w-[110px] ml-[18px] rounded-[4px] bg-[#d0011b] py-[4px] h-[32px] text-[15px] text-white"
                        @click="findCategory">
                        Cập nhật
                    </div>
                </div>
                <div v-if="tab == 'tab_2'" class="flex justify-end text-[14px] mr-[24px]">
                    <div @click="tab = 'tab_1'"
                        class="cursor-pointer flex justify-center items-center w-[110px] rounded-[4px] bg-[#ffffff] py-[4px] h-[32px] text-[15px] text-black border border-[#7d7f92]">
                        Quay lại
                    </div>
                    <div class="cursor-pointer flex justify-center items-center w-[110px] ml-[18px] rounded-[4px] bg-[#d0011b] py-[4px] h-[32px] text-[15px] text-white"
                        @click="findCategory">
                        Thêm mới
                    </div>
                </div>
            </div>
        </template>
    </el-dialog>
</template>

<script>
import axios from 'axios';
import { Link } from '@inertiajs/vue3'
import { ElMessage } from 'element-plus'
import { ElLoading } from 'element-plus'

export default {
    components: {
        Link,
    },
    data() {
        return {
            dialogVisible: false,
            tab: "tab_1",
            dataForm: {
                title: '',
                description: '',
                image: '',
                content: '',
                hagtags: [],
                is_notice: "1"
            },
            errors: []
        }
    },
    methods: {
        open() {
            this.dialogVisible = true
        },
        cancel() {
            this.dialogVisible = false;
        },
    },
}
</script>
<style>
#edit-address-pay .el-dialog__header {
    background-color: #fff;
    border-bottom: 1px solid #ccc;
    margin-right: 0 !important;
}
#edit-address-pay .main {
    overflow-x: scroll;
}
#edit-address-pay .el-dialog__body {
    padding: 0 !important;
}
#edit-address-pay .el-dialog__footer {
    padding: 8px 0 !important;
}
#edit-address-pay .el-radio.el-radio--large {
    height: 60px;
}
#add-address .el-radio.el-radio--large {
    height: 36px;
}
#edit-address-pay .el-radio-group {
    width: 100% !important;
}
[type='text']:focus{
    --tw-ring-color: none !important;
}
</style>

