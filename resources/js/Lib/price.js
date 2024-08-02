
export default {
    methods: {
        formatPrice(price = 0) {
            return price.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' })
        },
        formatValue(value = 0) {
            if (value >= 1000000) {
                return (value / 1000000).toFixed(1) + 'tr';
            } else if (value >= 1000) {
                return (value / 1000).toFixed(1) + 'k';
            } else {
                return value.toString();
            }
        },
    },
}
