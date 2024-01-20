<template>
    <el-dialog v-model="isShowForm" 
        :close-on-click-modal="false" 
        id="create-product-sale"
        class="bg-[#f4f1f8]"
    >
        <template #header>
            <div class="text-center font-bold text-[18px]">
                Thêm lịch săn sale
            </div>
        </template>
        <div class="overflow-scroll">
            <el-form ref="form" :model="formData" :rules="rules" label-position="top">
                <el-form-item label="Thời gian sale" class="w-full" prop="files" :error="getError('files')"
                    :inline-message="hasError('files')">
                    <el-select v-model="formData.date" placeholder="Chọn khung giờ">
                        <el-option
                            v-for="(date, index) in dateOption"
                            :key="index"
                            :label="date.time"
                            :value="date.time"
                        />
                    </el-select>
                </el-form-item>
                <el-form-item label="Sản phẩm chọn" class="w-full" prop="files" :error="getError('files')"
                    :inline-message="hasError('files')">
                    <div v-if="productSelect.length == 0" class=" mt-[4px] py-[12px] w-full text-center bg-[#e8e8e8]">
                        Không có dữ liệu
                    </div>
                    <div v-else class="flex flex-wrap gap-4">
                        <div 
                            v-for="(product, index) in productSelect" :key="index"
                            class="flex items-center border px-[12px] py-[4px] rounded-[4px] gap-4"
                        >
                            <img :src="product.image" class="object-cover aspect-square"/>
                            <div class="flex flex-col gap-1 py-[4px] mr-[8px]">
                                <div class="leading-[18px] flex">
                                    <div class="w-[74px] font-bold">Mã SP: </div>
                                    <span>{{ product.uuid }}</span>
                                </div>
                                <div class="leading-[18px] flex">
                                    <div class="w-[74px] font-bold">Số lượng: </div>
                                    <span>{{ product.discount_amount }}</span>
                                </div>
                                <div class="leading-[18px] flex">
                                    <div class="w-[74px] font-bold">Tên SP: </div>
                                    <span>{{ product.name }}</span>
                                </div>
                            </div>
                            <div class="cursor-pointer" @click="removeProduct(index)">
                                <i class="bi bi-x-lg"></i>
                            </div>
                        </div>
                    </div>
                </el-form-item>
                <el-form-item label="Danh sách sản phẩm" class="w-full">
                    <DataTable
                        v-loading="loadForm"
                        :fields="fields" 
                        :items="listProduct" 
                        :paginate="paginate" 
                        footer-center 
                        paginate-background
                        @page-change="changePage"
                    >
                        <template #action="{ row }">
                            <div v-if="!checkSelect(row)" class="flex justify-center gap-3">
                                <el-button type="info" @click="addProduct(row)"> 
                                    Thêm
                                </el-button>
                            </div>
                        </template>
                    </DataTable>
                </el-form-item>
            </el-form>
        </div>
        <template #footer>
            <div class="flex justify-end items-center">
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
            </div>
        </template>
    </el-dialog>
</template>
<script>
import { Head, Link } from '@inertiajs/vue3'
import form from '@/Mixins/form'
import DataTable from '@/Components/DataTable.vue'
import { ElMessage, ElMessageBox } from 'element-plus'

export default {
    components: {
        Head, DataTable 
    },
    mixins: [form],
    data: function () {
        return {
            isShowForm: false,
            dateOption: [
                { time: '00:00 - 03:00' },
                { time: '03:00 - 06:00' },
                { time: '06:00 - 09:00' },
                { time: '09:00 - 12:00' },
                { time: '12:00 - 15:00' },
                { time: '15:00 - 18:00' },
                { time: '18:00 - 21:00' },
                { time: '21:00 - 24:00' }
            ],
            productSelect: [],
            listProduct: [
                {
                    id: 1,
                    uuid: 'SP0001',
                    name: 'Sản phẩm từ Việt Nam',
                    price: 10000,
                    count: 123
                }
            ],
            paginate: [],
            fields: [
                { key: 'uuid', label: 'Mã', width: 80, align: 'center', headerAlign: 'center', headerAlign: 'center' },
                { key: 'name', label: 'Tên SP', minWidth: 150, align: 'left', headerAlign: 'center' },
                { key: 'price', label: 'Giá', width: 100, align: 'center', headerAlign: 'center' },
                { key: 'count', label: 'Tổn kho', width: 100, align: 'center', headerAlign: 'center' },
                { key: 'action', label: 'Thao tác', width: 90, align: 'center', headerAlign: 'center', fixed: 'right' },
            ],
            formData: {
                date: null,
            },
            rules: {
                date: { required: true, message: 'Trường này là bắt buộc', trigger: ['change', 'blur'] },
            }
        }
    },
    watch: {
        isShowForm(val) {
            if (val == false) {
                this.productSelect = []
                this.formData.date = ''
            }
        }
    },

    async created() {
    },
    methods: {
        open() {
            this.isShowForm = true
        },
        searchProduct() {

        },
        addProduct(product) {
            ElMessageBox.prompt('Nhập số lượng sale', {
                confirmButtonText: 'OK',
                cancelButtonText: 'Hủy bỏ',
                inputPattern:/^\d+$/,
                inputErrorMessage: 'Vui lòng nhập đúng số lượng',
            })
                .then(({ value }) => {
                    if (value > product.count) {
                        this.$message({message: 'Số lượng sale không được lớn số lượng tồn kho', type: 'error'})
                    } else {
                        let productNew = { ...product }
                        productNew.discount_amount = value
                        this.productSelect.push(productNew)
                        this.$message({message: 'Thêm sản phẩm thành công', type: 'success'})
                    }
                })
        },
        removeProduct(index) {
            this.productSelect.splice(index, 1)
        },
        checkSelect(item) {
            return this.productSelect.find(product => item.id == product.id) ? true : false
        },
        submit() {

        }
    }
}
</script>
<style>
#create-product-sale .el-dialog__header {
    border-bottom: 1px solid #ccc;
    margin-right: 0 !important;
}
#create-product-sale {
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
    #create-product-sale {
        width: 90%;
    }
}
</style>