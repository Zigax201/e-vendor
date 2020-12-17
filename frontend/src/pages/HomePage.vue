<template>
    <div>
        <Header />

        <div class="container">
            <h2 class="text-3xl text-gray-500 font-light mx-8">Welcome, Muhajir</h2>
        </div>
        <div class="container">
            <h3 class="text-xl text-gray-500 font-semibold mx-8">New Product</h3>
            <div class="product-container mx-8 flex flex-wrap justify-between">
                <div class="product w-48 border rounded p-2 mr-2">
                    <img
                        src="https://via.placeholder.com/150"
                        class="h-44 w-44 object-cover"
                        alt
                        srcset
                    />
                    <p class="font-semibold text-blue-900">Lorem ipsum dolor sit amet consectetur</p>
                    <p class="text-gray-500">IDR.50.000</p>
                </div>
                <div class="product w-48 border rounded p-2 mr-2">
                    <img
                        src="https://via.placeholder.com/150"
                        class="h-44 w-44 object-cover"
                        alt
                        srcset
                    />
                    <p class="font-semibold text-blue-900">Lorem ipsum dolor sit amet consectetur</p>
                    <p class="text-gray-500">IDR.50.000</p>
                </div>
                <div class="product w-48 border rounded p-2 mr-2">
                    <img
                        src="https://via.placeholder.com/150"
                        class="h-44 w-44 object-cover"
                        alt
                        srcset
                    />
                    <p class="font-semibold text-blue-900">Lorem ipsum dolor sit amet consectetur</p>
                    <p class="text-gray-500">IDR.50.000</p>
                </div>
                <div class="product w-48 border rounded p-2 mr-2">
                    <img
                        src="https://via.placeholder.com/150"
                        class="h-44 w-44 object-cover"
                        alt
                        srcset
                    />
                    <p class="font-semibold text-blue-900">Lorem ipsum dolor sit amet consectetur</p>
                    <p class="text-gray-500">IDR.50.000</p>
                </div>
                <div class="product w-48 border rounded p-2 mr-2">
                    <img
                        src="https://via.placeholder.com/150"
                        class="h-44 w-44 object-cover"
                        alt
                        srcset
                    />
                    <p class="font-semibold text-blue-900">Lorem ipsum dolor sit amet consectetur</p>
                    <p class="text-gray-500">IDR.50.000</p>
                </div>
                <div class="product w-48 border rounded p-2 mr-2">
                    <img
                        src="https://via.placeholder.com/150"
                        class="h-44 w-44 object-cover"
                        alt
                        srcset
                    />
                    <p class="font-semibold text-blue-900">Lorem ipsum dolor sit amet consectetur</p>
                    <p class="text-gray-500">IDR.50.000</p>
                </div>
            </div>
        </div>

        <div class="mt-8">
            <div class="mx-8 mb-8">
                <img
                    class="object-cover w-full"
                    src="https://via.placeholder.com/800x150"
                    alt
                    srcset
                />
            </div>
            <h3 class="text-xl text-gray-500 font-semibold mx-8">Recomended Product</h3>
            <div class="product-container mx-8 flex flex-wrap">
                <div class="product w-48 border rounded p-2 mr-2">
                    <img
                        src="https://via.placeholder.com/150"
                        class="h-44 w-44 object-cover"
                        alt
                        srcset
                    />
                    <p class="font-semibold text-blue-900">Lorem ipsum dolor sit amet consectetur</p>
                    <p class="text-gray-500">IDR.50.000</p>
                </div>
                <div class="product w-48 border rounded p-2 mr-2">
                    <img
                        src="https://via.placeholder.com/150"
                        class="h-44 w-44 object-cover"
                        alt
                        srcset
                    />
                    <p class="font-semibold text-blue-900">Lorem ipsum dolor sit amet consectetur</p>
                    <p class="text-gray-500">IDR.50.000</p>
                </div>
                <div class="product w-48 border rounded p-2 mr-2">
                    <img
                        src="https://via.placeholder.com/150"
                        class="h-44 w-44 object-cover"
                        alt
                        srcset
                    />
                    <p class="font-semibold text-blue-900">Lorem ipsum dolor sit amet consectetur</p>
                    <p class="text-gray-500">IDR.50.000</p>
                </div>
                <div class="product w-48 border rounded p-2 mr-2">
                    <img
                        src="https://via.placeholder.com/150"
                        class="h-44 w-44 object-cover"
                        alt
                        srcset
                    />
                    <p class="font-semibold text-blue-900">Lorem ipsum dolor sit amet consectetur</p>
                    <p class="text-gray-500">IDR.50.000</p>
                </div>
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
import axios from "axios";
export default {
    props: {
        message: String,
    },
    data() {
        return {
            nama: "muhajir",
            result: "",
            fromapi: "",
            data: [
                {
                    nama: "muhajir",
                },
                {
                    nama: "besar",
                },
                {
                    nama: "kevin",
                },
                {
                    nama: "Zigax",
                },
            ],
        };
    },
    created() {
        this.callapi();
    },
    methods: {
        ubahnama() {
            this.nama = "besar";
        },
        async callapi() {
            var url = "https://jsonplaceholder.typicode.com/todos/1";
            var response = await axios.get(url);

            if (response.status != 200) {
                this.fromapi = "GAGAL mengambil data api";
                return;
            }

            this.fromapi = response.data;
        },
    },
    components: {
        Header,
        Footer,
    },
};
</script>