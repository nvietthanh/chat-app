<template>
    <div id="loading-image" class="relative">
        <div v-if="loading" v-loading="loading" class="loading-spinner"/>
        <template v-if="!imageUrl">
            <div class="aspect-square el-image__placeholder flex justify-center items-center text-[#aaaaaa]">
                Không có hình ảnh
            </div>
        </template>
        <template v-else>
            <el-image
                :src="imageUrl" 
                :fit="typeFit" :lazy="isLazy"
                class="w-full h-full"
                :class="{
                    'loading-image' : loading,
                }"
                @load="handleImageLoad"
                @error="handleImageLoad"
            >
                <template #error>
                    <div class="aspect-square el-image__placeholder flex justify-center items-center text-[#aaaaaa]">
                        Không có hình ảnh
                    </div>
                </template>
            </el-image>
        </template>
    </div>
</template>

<script>
export default {
    name: 'ImageLoading',
    props: {
        imageUrl: { type: String, required: true },
        typeFit: { type: String, default: 'cover' },
        isLazy: { type: Boolean, default: true },
    },
    data() {
        return {
            loading: true
        };
    },
    methods: {
        handleImageLoad() {
            this.loading = false;
        },
    },
};
</script>
<style>
#loading-image.image-small .el-loading-spinner {
    margin-top: calc((0px - var(--tw-loading-spinner-size-small)) / 2);
}
#loading-image.image-small .el-loading-spinner .circular {
    height: var(--tw-loading-spinner-size-small);
    width: var(--tw-loading-spinner-size-small);
}
#loading-image .loading-spinner {
    top: 0;
    left: 0;
    position: absolute;
    background-color: #434343;
    width: 100%;
    height: 100%;
    z-index: 1000 !important;
}
#loading-image .el-image {
    min-height: 80px;
    width: 100%;
    height: 100%;
    display: block !important;
}
</style>