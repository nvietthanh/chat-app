<template>
    <Link :href="route('product', product.id)">
    <!-- <el-image :src="product.image_url" fit="cover" class="w-[100%] aspect-square rounded-t-[4px]" /> -->
    <ImageLoading :image-url="product?.image_url" class="w-[100%] aspect-square rounded-t-[4px]"/>
    <div class="px-[12px] pb-[12px] mt-[8px] min-h-[150px]">
        <div>{{ product.name }}</div>
        <div class="font-bold my-[4px]">
            <div class="flex items-end text-[12px]">
                <div class="line-through">{{ formatPrice(product.price) }}</div>
                <div class="text-[14px] ml-[18px] text-[#d0021c]">-5%</div>
            </div>
            <div class="text-[#d0021c] text-[14px]">
                {{ formatPrice(product.price) }}
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
    </Link>
</template>
<script>
import { Head, Link } from '@inertiajs/vue3';
import price from '@/Lib/price'
import ImageLoading from '@/Components/ImageLoading.vue'

export default {
    components: {
        Head,
        Link,
        ImageLoading
    },
    props: {
        product: { type: Object, required: true },
    },
    mixins: [price],
}
</script>