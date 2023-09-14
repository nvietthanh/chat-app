<template>
    <el-dialog v-model="showEditForm" 
        :close-on-click-modal="false" 
        id="edit-product-sale"
        class="bg-[#f4f1f8]"
    >
        <template #header>
            <div class="text-center font-bold text-[18px]">
                {{ editSale ? 'Chỉnh sửa thông tin sale' : 'Thông tin lịch săn sale' }}
            </div>
        </template>
        <div class="overflow-scroll">
            <div v-if="editSale">
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
                        <div v-if="productSelect" class=" mt-[4px] py-[12px] w-full text-center bg-[#e8e8e8]">
                            Không có dữ liệu
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
                                <div class="flex justify-center gap-3">
                                    <el-button type="info" @click="rowClick(row.student_id, row.plan_tag, row.year)"> 
                                        Thêm    
                                    </el-button>
                                </div>
                            </template>
                        </DataTable>
                    </el-form-item>
                </el-form>
            </div>
            <div v-else>
                <div>
                    <b>Thời gian sale:</b> 12:00 - 14:00
                </div>
                <div class="mt-[12px]">
                    <div class="font-bold">Danh sách sản phẩm</div>
                    <div class="mt-[12px] grid md:grid-cols-3 lg:grid-cols-4 grid-cols-2 gap-4">
                        <div 
                            v-for="(product, index) in productSelect" :key="index"
                            class="bg-[white] rounded-[4px] mb-[12px] border-[1px] border-[#D8D9DA]"
                        >
                            <img src="/images/devices/phone/dienthoai-1.webp" alt=""
                                class="w-[100%] rounded-t-[4px] border-b-[1px] border-[#D8D9DA]">
                            <div class="px-[12px] pb-[12px] mt-[8px] min-h-[150px]">
                                <div>OPPO Reno10 5G 256GB Xanh</div>
                                <div class="font-bold my-[4px]">
                                    <div class="flex items-end text-[12px]">
                                        <div class="line-through">
                                            8.490.000₫
                                        </div>
                                        <div class="text-[14px] ml-[18px] text-[#d0021c]">-5%</div>
                                    </div>
                                    <div class="text-[#d0021c] text-[14px]">
                                        8.490.000₫
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <div class="text-[#fb6e30] text-[10px]">
                                        <i class="bi bi-star-fill mr-[2px]"></i>
                                        <i class="bi bi-star-fill mr-[2px]"></i>
                                        <i class="bi bi-star-fill mr-[2px]"></i>
                                        <i class="bi bi-star-fill mr-[2px]"></i>
                                        <i class="bi bi-star-half mr-[2px]"></i>
                                    </div>
                                    <span class="ml-[8px] text-[12px]">Đã bán 0k</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <template #footer>
            <div class="flex justify-end items-center">
                <div v-if="editSale" class="flex gap-2">
                    <button @click="editSale = false"
                        class="w-[100px] text-center h-[32px] leading-[32px] border-[1px] border-[#b2b2b2]">
                        Hủy bỏ
                    </button>
                    <button @click="doSubmit"
                        class="w-[100px] text-center h-[32px] leading-[32px] border-[1px] text-[white] bg-[#d0011b]">
                        Lưu
                    </button>
                </div>
                <div v-else>
                    <button @click="editSale = true"
                        class="w-[100px] text-center h-[32px] leading-[32px] border-[1px] text-[white] bg-[#d0011b]"
                    >
                        Chỉnh sửa
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

export default {
    components: {
        Head, DataTable 
    },
    mixins: [form],
    async created() {
    },
    data: function () {
        return {
            showEditForm: false,
            editSale: false,
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
            productSelect: [
                {
                    uuid: 'SP0001',
                    name: 'Sản phẩm từ Việt Nam',
                    price: 10000,
                    count: 123,
                    discount_amount: 12,
                }
            ],
            listProduct: [
                {
                    uuid: 'SP0001',
                    name: 'Sản phẩm từ Việt Nam',
                    price: 10000,
                    count: 123
                }
            ],
            paginate: [],
            fields: [
                { key: 'uuid', label: 'Mã', width: 80, align: 'center', headerAlign: 'center', fixed: 'left' },
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
    methods: {
        open() {
            this.showEditForm = true
        },
        searchProduct() {

        },
        addProduct(product) {

        },
        removeProduct(product) {

        },
        submit() {

        }
    }
}
</script>
<style>
#edit-product-sale .el-dialog__header {
    border-bottom: 1px solid #ccc;
    margin-right: 0 !important;
}
#edit-product-sale {
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
    #edit-product-sale {
        width: 90%;
    }
}
</style>