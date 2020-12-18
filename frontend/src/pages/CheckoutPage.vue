<template>
    <div class="mx-8">
        <h1 class="my-4 text-xl">Your Cart</h1>
        <div class="flex flex-wrap">
            <div class="left flex-1 flex">
                <div class="product w-60 border rounded p-2 mr-2">
                    <img :src="produk.image_url" class="w-60 object-cover" alt srcset />
                    <p class="font-semibold text-blue-900">{{produk.name}}</p>
                    <p class="text-gray-500">IDR.{{produk.price}}</p>
                </div>
                <div>
                    <p class="text-gray-600">Quantity</p>
                    <div class="flex justify-between bg-gray-200 rounded overflow-hidden">
                        <button
                            @click="addQuantity(-1)"
                            class="py-2 px-4 bg-gray-300 focus:outline-none hover:bg-blue-200"
                        >-</button>
                        <p class="py-2 px-4 text-blue-900">{{transaction.quantity}}</p>
                        <button
                            @click="addQuantity(1)"
                            class="py-2 px-4 bg-gray-300 focus:outline-none hover:bg-blue-200"
                        >+</button>
                    </div>

                    <p class="text-gray-600 mt-6">Total</p>
                    <p class="text-gray-700 text-xl">IDR. {{transaction.total}}</p>
                </div>
            </div>
            <div class="flex-1">
                <input
                    v-model="shipping_address"
                    type="text"
                    class="outline-none border w-full p-4"
                    placeholder="shipping address"
                />
                <p class="my-4 text-xl">Payment Details</p>
                <table class="w-full border">
                    <tr>
                        <td class="text-gray-500 px-4 pt-4">Items ({{transaction.quantity}})</td>
                        <td class="px-4 pt-4 text-right">{{transaction.total}}</td>
                    </tr>
                    <tr>
                        <td class="text-gray-500 px-4">Shipping</td>
                        <td class="px-4 text-right">{{shipping}}</td>
                    </tr>
                    <tr>
                        <td class="text-gray-500 px-4">Tax</td>
                        <td class="px-4 text-right">{{tax}}</td>
                    </tr>
                    <tr>
                        <td class="font-semibold px-4 pb-4">Total Price</td>
                        <td class="font-semibold text-blue-900 px-4 text-right">{{totalPrice}}</td>
                    </tr>
                </table>
                <button
                    v-if="auth"
                    @click="checkout"
                    :disabled="isLoading"
                    class="block w-full px-2 py-4 bg-blue-500 text-center rounded text-white mt-8"
                >Checkout</button>
                <router-link
                    v-else
                    to="/login"
                    class="block w-full px-2 py-4 bg-blue-500 text-center rounded text-white mt-4"
                >Sign In</router-link>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            isLoading: false,
            produk: {
                id: null,
                name: null,
                image_url: null,
                price: null,
                quantity: null,
                rating: null,
                sold: null,
                description: null,
            },
            transaction: {
                quantity: 1,
                total: 0,
            },
            shipping: 25000,
            tax: 5000,
            totalPrice: 0,
            shipping_address: "",
            auth: false,
            user_id: "",
        };
    },
    watch: {
        transaction: {
            deep: true,
            handler() {
                this.totalPrice =
                    parseInt(this.shipping) +
                    parseInt(this.tax) +
                    parseInt(this.transaction.total);
            },
        },
    },
    created() {
        this.fetchProduct();
        this.fetchUser();
    },
    methods: {
        async fetchProduct() {
            var response = await this.callApi(
                "get",
                "product?id=" + this.$route.params.id
            );
            if (response.status != 200) {
                this.$router.push({ path: `/` });
                return;
            }
            this.produk = response.data.data;
            this.transaction.total = this.produk.price;
        },
        addQuantity(amount) {
            if (this.transaction.quantity == 1 && amount < 0) {
                return;
            }

            this.transaction.quantity += amount;
            this.transaction.total =
                this.transaction.quantity * this.produk.price;
        },
        async checkout() {
            this.isLoading = true;
            var token = localStorage.getItem("token");
            var response = await this.callApi(
                "post",
                "checkout",
                {
                    product_id: this.produk.id,
                    user_id: this.user_id,
                    quantity: this.transaction.quantity,
                    total_price: this.totalPrice,
                    status: "pending",
                    shipping_address: this.shipping_address,
                },
                {
                    Authorization: "Bearer " + token,
                }
            );

            if (response.status != 200) {
                console.log("checkout gagal");
                this.isLoading = false;
                return;
            }
            console.log(response.data);
            this.$router.push({ path: `/success` });
        },
        async fetchUser() {
            var token = localStorage.getItem("token");

            if (token) {
                var response = await this.callApi(
                    "get",
                    "user",
                    {},
                    {
                        Authorization: "Bearer " + token,
                    }
                );
                if (response.status != 200) {
                    return;
                }

                this.auth = true;
                this.user_id = response.data.data.id;
            }
        },
    },
};
</script>