<template>
    <Head title="Thông tin mô tả cửa hàng" />
    <div id="maker-description">
        <div class="bg-[white] py-[18px] sm:px-[8px] px-[0px]">
            <div class="product-desc">
                <img 
                    v-for="(item, index) in pathImages" :key="index"
                        :src="item"
                        class="w-full aspect-[4/3] object-cover"/>
                <div v-html="formData.content" class="mt-[12px]"/>
            </div>
            <div class="flex justify-end my-[32px]">
                <div @click="openEditForm"
                    class="button mb-[4px] mt-[8px] ml-[24px] w-[110px] text-center h-[32px] leading-[32px] border-[1px] text-[white] bg-[#d0011b] cursor-pointer">
                    Chỉnh sửa
                </div>
            </div>
            <EditInfor ref="editForm"/>
        </div>
    </div>
</template>
<script>
import { Head, Link } from '@inertiajs/vue3'
import EditInfor from './InforComponent/EditInfor.vue'
import form from '@/Mixins/form'

export default {
    components: {
        Head, EditInfor
    },
    mixins: [form],
    async created() {
    },
    data: function () {
        return {
            formData: {
                content: 'data set cứng',
            },
            pathImages: []
        }
    },
    methods: {
        changeData(value) {
            this.formData.content = value
        },
        openEditForm() {
            console.log(1)
            this.$refs.editForm.open(this.formData)
        },
        submit() {

        }
    }
}
</script>
<style>
#image-preview {
    width: 50%;
}
@media screen and (max-width: 768px){
    #image-preview {
        width: 90%;
    }
}
</style>