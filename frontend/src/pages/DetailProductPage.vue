<template>
    <div>
        <Header />
        <div class="mx-8 border p-2 flex flex-wrap mt-8">
            <div class="left flex-1">
                <img :src="produk.image_url" class="object-cover w-full" alt srcset />
            </div>
            <div class="right flex-1 box-border p-4">
                <p class="font-semibold text-3xl text-blue-900">{{produk.name}}</p>
                <p class="text-gray-400">Rating {{produk.rating}}/10</p>
                <p class="text-gray-500 font-medium text-xl mb-4">IDR.{{produk.price}}</p>
                <hr />
                <p class="text-gray-600 font-medium mt-4">Description</p>
                <p class="text-gray-400 text-justify">{{produk.description}}</p>

                <router-link
                    :to="'/checkout/'+produk.id"
                    class="block w-full px-2 py-4 bg-blue-500 text-center rounded text-white mt-16"
                >Add To Cart</router-link>
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
        };
    },
    created() {
        this.fetchProduct();
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
        },
    },
    components: {
        Header,
        Footer,
    },
};
</script>