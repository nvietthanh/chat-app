import axios from 'axios';
import { defineStore } from 'pinia'

export const useCart = defineStore('cart', {
    state: () => ({
        cartProducts: [],
    }),
    actions: {
        getCart() {
            let products = []
            if (!this.user) {
                let cartData = localStorage.getItem('cart');
                let cartProducts = cartData ? JSON.parse(cartData) : [];
                const productIds = cartProducts.map(product => product.id)

                let params = {
                    product_ids: productIds
                }
                axios.get(route('api.product.get-by-id', params))
                    .then(({data}) => {
                        products = data.data
                        products.forEach(product => {
                            const findProduct = cartProducts.find(item => item.id === product.id)
                            product.quantity = findProduct.quantity
                        });
                        this.cartProducts = products
                    })
            } else {

            }
        },
        addCart(product, quantity) {
            let productCart = this.cartProducts.find(item =>  item.id === product.id)
            if (productCart) {
                productCart.quantity += quantity
            } else {
                this.cartProducts.push({
                    id: product.id,
                    name: product.name,
                    image_url: product.image_url,
                    price: product.price,
                    quantity: quantity,
                })
            }

            this.addLocalStorage(product.id, quantity)
        },
        addLocalStorage(productId, quantity) {
            let cartData = localStorage.getItem('cart');
            let cartProducts = cartData ? JSON.parse(cartData) : [];

            const existingProduct = cartProducts.find(item => item.id === productId)
            if (existingProduct) {
                existingProduct.quantity += quantity
            } else {
                cartProducts.push({ id: productId, quantity: quantity })
            }
        
            this.productCarts = cartProducts
            localStorage.setItem('cart', JSON.stringify(cartProducts))
        },
        removeCart(product) {
            let indexProduct = this.cartProducts.findIndex(item =>  item.id === product.id)

            this.cartProducts.shift(indexProduct, 1)
            localStorage.setItem('cart', JSON.stringify(this.cartProducts))

        },
        removeAllCart() {
            localStorage.removeItem('cart')
            this.productCarts = []
        },
    },
})
