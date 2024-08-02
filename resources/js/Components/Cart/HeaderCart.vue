<template>
    <div id="cart-icon" class="relative">
        <div class="cursor-pointer px-[12px] relative">
            <i class="bi bi-cart text-[26px]"></i>
            <div class="text-[13px] absolute bottom-[50%] flex items-center justify-center right-0 w-[24px] h-[20px] text-[#d0011b] bg-[#fff] rounded-[50%]">
                {{ cartProducts.length }}
            </div>
        </div>
        <div id="cart-products" class="py-[12px] text-[#000]">
            <div class="px-[18px] pb-[8px] border-b-[1px] border-[#b2b2b2]">
                Giỏ hàng
            </div>
            <div class="list-cart">
                <div id="list-cart-product">
                    <template v-if="cartProducts.length == 0">
                        <div class="h-[120px] flex items-center justify-center">
                            Chưa có sản phẩm nào trong giỏ hàng
                        </div>
                    </template>
                    <template v-else>
                        <div v-for="product in cartProducts" class="px-[18px] py-[12px] flex">
                            <Link :href="route('product', 1)">
                                <img :src="product.image_url" alt="" class="w-[50px] h-[50px] border-[1px]">
                            </Link>
                            <div class="ml-[12px] flex-1">
                                <div class="flex justify-between">
                                    <Link :href="route('product', 1)">
                                        <div class="hidden-two-line">
                                            {{ product.name }}
                                        </div>
                                    </Link>
                                    <div class="ml-[18px] text-[14px]">
                                        <div class="text-[#d0021c]">{{ formatPrice(product.price) }}</div>
                                        <div class="mt-[2px]">x{{ product?.quantity }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-end">
                            <Link :href="route('cart')"
                                class="button mb-[4px] mt-[8px] mr-[32px] w-[120px] text-center h-[38px] leading-[38px] border-[1px] text-[white] bg-[#d0011b]">
                                Xem giỏ hàng
                            </Link>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import { mapActions, mapState } from 'pinia'
import { Link } from '@inertiajs/vue3'
import price from '@/Lib/price'
import { useCart } from '@/Store/Modules/cart.js'

export default {
    props: {
        user: {
            type: Boolean,
            required: true,
        },
    },
    mixins: [price],
    components: {
        Link
    },
    data() {
        return {
            products: []
        }
    },
    computed: {
        ...mapState(useCart, ['cartProducts']),
    },
    created() {
        this.getCart()
    },
    methods: {
        ...mapActions(useCart, ['getCart']),
    }
}
</script>