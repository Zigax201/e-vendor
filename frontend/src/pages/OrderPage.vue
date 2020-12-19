<template>
    <div>
        <Header />
        <div class="mx-24 py-4">
            <div
                v-for="transaction in transactions"
                :key="transaction.id"
                class="order border rounded p-2 my-2"
            >
                <p>Order ID : {{transaction.id}}</p>
                <p>Order at E-Vendor : {{transaction.created_at}}</p>
                <hr />
                <div class="flex justify-between">
                    <p class="font-medium">Order Status</p>
                    <p>{{transaction.status.toUpperCase()}}</p>
                </div>
                <p class="font-medium">Items</p>
                <div class="produk flex mb-4">
                    <img
                        :src="transaction.product.image_url"
                        class="rounded h-16 w-16 mr-2"
                        alt
                        srcset
                    />
                    <div>
                        <p>{{transaction.product.name}}</p>
                        <p
                            class="text-gray-500"
                        >{{transaction.product.price}} x {{transaction.quantity}} (items)</p>
                    </div>
                </div>
                <p class="font-medium">Shipping Address</p>
                <p class="text-gray-500">{{transaction.shipping_address}}</p>
                <div class="flex justify-between">
                    <p class="font-medium">Price</p>
                    <p class="font-medium">IDR {{transaction.total_price}}</p>
                </div>
                <a
                    v-if="transaction.status.toUpperCase() == 'PENDING'"
                    :href="transaction.transaction_url"
                    target="blank"
                    class="block py-2 px-2 text-center rounded bg-blue-500 text-white focus:outline-none hover:bg-blue-600 mt-6"
                >Bayar</a>
            </div>
        </div>

        <Footer />
    </div>
</template>
<script>
import Header from "../components/Header";
import Footer from "../components/Footer";
export default {
    data() {
        return {
            transactions: [],
        };
    },
    created() {
        this.fetchTransaction();
    },
    methods: {
        async fetchTransaction() {
            var token = localStorage.getItem("token");
            if (token) {
                var response = await this.callApi(
                    "get",
                    "transaction?limit=100",
                    {},
                    {
                        Authorization: "Bearer " + token,
                    }
                );

                if (response.status != 200) {
                    return;
                }
                this.transactions = response.data.data.data;
            }
        },
    },
    components: {
        Header,
        Footer,
    },
};
</script>