<template>
    <div>
        <Header />

        <div class="container">
            <!-- <h2 class="text-3xl text-gray-500 font-light mx-8">Welcome, Muhajir</h2> -->
        </div>
        <div class="container">
            <h3 class="text-xl text-gray-500 font-semibold mx-8">New Product</h3>
            <div class="product-container mx-8 flex flex-wrap justify-between">
                <Product
                    v-for="product in products"
                    :key="product.id"
                    :name="product.name"
                    :price="product.price"
                    :image_url="product.image_url"
                    :id="product.id"
                />
            </div>
        </div>

        <div class="mt-8">
            <div class="mx-8 mb-8">
                <img class="object-cover w-full h-56" src="../assets/banner.jpg" alt srcset />
            </div>
            <h3 class="text-xl text-gray-500 font-semibold mx-8">Recomended Product</h3>
            <div class="product-container mx-8 flex flex-wrap">
                <Product
                    v-for="product in recomendeds"
                    :key="product.id"
                    :name="product.name"
                    :price="product.price"
                    :image_url="product.image_url"
                />
            </div>
        </div>

        <Footer />
    </div>
</template>

<style lang="css">
</style>

<script>
import Header from "../components/Header";
import Footer from "../components/Footer";
import Product from "../components/Product";
export default {
    props: {
        message: String,
    },
    data() {
        return {
            nama: "muhajir",
            result: "",
            products: null,
            recomendeds: null,
        };
    },
    async created() {
        this.products = await this.callApi("get", "product?limit=100");
        if (this.products) {
            if (this.products.status != 200) {
                return;
            }

            this.products = this.products.data.data.data;
            console.log(this.products);
        }

        this.recomendeds = await this.callApi(
            "get",
            "product?rate_to=10&rate_from=6&limit=100"
        );
        if (this.recomendeds) {
            if (this.recomendeds.status != 200) {
                return;
            }

            this.recomendeds = this.recomendeds.data.data.data;
            console.log(this.recomendeds);
        }
    },
    methods: {
        ubahnama() {
            this.nama = "besar";
        },
    },
    components: {
        Header,
        Footer,
        Product,
    },
};
</script>