<template>
    <el-dialog v-model="dialogVisible" id="edit-address" class="bg-[#fff] max-h-[90%] overflow-scroll sm:min-w-[600px] sm:max-w-[600px] min-w-[95%] mt-[32px]"
     :show-close="true">
        <template #header>
            <div class="text-center font-bold text-[18px]">
                Cập nhật địa chỉ
            </div>
        </template>
        <div class="sm:mx-[12px] px-[4px]">
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
        <template #footer>
            <div class="pb-[12px] pt-[8px]">
                <div class="flex justify-end text-[14px] mr-[24px]">
                    <div @click="cancel"
                        class="cursor-pointer flex justify-center items-center w-[110px] rounded-[4px] bg-[#ffffff] py-[4px] h-[32px] text-[15px] text-black border border-[#7d7f92]">
                        Hủy bỏ
                    </div>
                    <div class="cursor-pointer flex justify-center items-center w-[110px] ml-[18px] rounded-[4px] bg-[#d0011b] py-[4px] h-[32px] text-[15px] text-white"
                        @click="findCategory">
                        Cập nhật
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
            dataForm: {
                title: '',
                description: '',
                image: '',
                content: '',
                hagtags: [],
                is_notice: "1"
            },
        }
    },
    watch: {
        dialogVisible(value) {
            if(value == false) {
                this.clearResult()
            }
        }
    },
    methods: {
        async clearResult() {
            this.imageSelected = ''
            this.dataForm.title = ''
            this.dataForm.description = ''
            this.dataForm.image = ''
            if(this.$refs['content']) {
                this.$refs['content'].editorData = ''
            }
            this.dataForm.is_notice = "1"
            this.categorySelect = ''
            this.listCategory = ''
            this.listHagTag = []
            this.errors = []
        },
        open() {
            this.dialogVisible = true
            this.clearResult()
        },
        cancel() {
            this.dialogVisible = false;
        },
    },
}
</script>
<style>
#edit-address .el-dialog__header {
    background-color: #fff;
    border-bottom: 1px solid #ccc;
    margin-right: 0 !important;
}
#edit-address .el-radio.el-radio--large {
    height: 36px;
}
</style>

