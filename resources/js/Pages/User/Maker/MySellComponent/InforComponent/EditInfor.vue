<template>
    <el-dialog v-model="showEditForm" 
        :close-on-click-modal="false" 
        id="edit-infor"
        class="bg-[#f4f1f8]"
    >
        <template #header>
            <div class="text-center font-bold text-[18px]">
                Thêm bài viết mới
            </div>
        </template>
        <div class="overflow-scroll">
            <el-form ref="form" :model="formData" :rules="rules" label-position="top">
                <el-form-item label="Hình ảnh đầu trang" class="w-full" prop="files" :error="getError('files')"
                    :inline-message="hasError('files')">
                    <input type="file" ref="uploadFile" multiple hidden accept="image/jpg, image/png, image/jpeg, image/svg"
                        @change="handleUploadFile">
                    <button type="button" class="flex justify-center items-center border-[1px] border-[#d0011b] 
                                text-[#d0011b] w-[140px] rounded-[8px] mt-[6px]" @click="$refs.uploadFile.click()">
                        <i class="bi bi-arrow-bar-up text-[20px]"></i>
                        <span class="ml-[8px]">Tải ảnh lên</span>
                    </button>
                </el-form-item>
                <div class="grid sm:grid-cols-4 grid-cols-2 gap-4 mb-[18px]">
                    <div v-for="(item, index) in pathImages" class="relative">
                        <img :src="item" class="w-full aspect-[4/3] object-cover border-[1px]" @click="showPreviewImage(item)">
                        <div class="absolute top-[4px] right-[4px] w-[20px] h-[20px] bg-[white] rounded-[50%]
                                    flex items-center justify-center cursor-pointer" @click="removeFile(index)">
                            <i class="bi bi-x-lg text-[12px] mt-[1px] mr-[1px]"></i>
                        </div>
                    </div>
                </div>
                <el-form-item label="Nội dung mô tả" class="w-full" prop="content" :error="getError('content')"
                    :inline-message="hasError('content')">
                    <ckeditor-infor class="mt-[8px] w-full" :contentProp="formData.content" @updateContent="changeData" />
                </el-form-item>
            </el-form>
        </div>
        <template #footer>
            <span class="flex justify-end items-center">
                <div class="flex gap-2">
                    <button @click="cancelChange()"
                        class="w-[100px] text-center h-[32px] leading-[32px] border-[1px] border-[#b2b2b2]">
                        Hủy bỏ
                    </button>
                    <button @click="doSubmit"
                        class="w-[100px] text-center h-[32px] leading-[32px] border-[1px] text-[white] bg-[#d0011b]">
                        Lưu
                    </button>
                </div>
            </span>
        </template>
    </el-dialog>
    <el-dialog v-model="isShowImagePreview" top="50px" id="image-preview">
        <img :src="fileImagePreview" class="w-full" />
    </el-dialog>
</template>
<script>
import { Head, Link } from '@inertiajs/vue3'
import CkeditorInfor from '@/Components/Ckeditor/Ckeditor.vue'
import form from '@/Mixins/form'


export default {
    components: {
        Head, CkeditorInfor
    },
    mixins: [form],
    async created() {
    },
    data: function () {
        return {
            showEditForm: false,
            isShowImagePreview: false,
            fileImagePreview: '',
            rules: {
                content: { required: true, message: 'Trường này là bắt buộc', trigger: ['change', 'blur'] },
            },
            formData: {
                content: 'data set cứng',
            },
            fileImages: [],
            pathImages: []
        }
    },
    methods: {
        open(data) {
            this.showEditForm = true
            this.formData = data
        },
        changeData(value) {
            this.formData.content = value
        },
        cancelChange() {
            this.showEditForm = false
        },
        handleUploadFile(event) {
            if (event.target.files && event.target.files[0]) {
                let files = event.target.files
                for (let index = 0; index < files.length; index++) {
                    let pathImage = URL.createObjectURL(files[index])
                    this.fileImages.push(files[index])
                    this.pathImages.push(pathImage)
                }
            }
            event.target.value = null
        },
        removeFile(index) {
            this.fileImages.splice(index, 1)
            this.pathImages.splice(index, 1)
        },
        showPreviewImage(file) {
            this.isShowImagePreview = true,
                this.fileImagePreview = file
        },
        submit() {

        }
    }
}
</script>
<style>
#edit-infor .el-dialog__header {
    border-bottom: 1px solid #ccc;
    margin-right: 0 !important;
}
#edit-infor {
    width: 60%;
    margin-top: 30px;
    height: 90%;
}
.el-dialog__body {
    max-height: 74vh;
    min-height: 74vh;
    overflow: scroll;
}
@media screen and (max-width: 768px){
    #edit-infor {
        width: 90%;
    }
}
</style>