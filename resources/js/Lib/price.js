
export default {
    methods: {
        formatPrice(price) {
            return price.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' })
        }
    },
}
