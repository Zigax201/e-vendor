<template>
    <div>
        <Header />
        <div class="mx-8 border p-2 flex flex-wrap mt-8">
            <div class="left flex-1">
                <img src="https://via.placeholder.com/800" class="object-cover w-full" alt srcset />
            </div>
            <div class="right flex-1 box-border p-4">
                <p
                    class="font-semibold text-3xl text-blue-900"
                >Lorem ipsum dolor sit amet consectetur</p>
                <p class="text-gray-400">Rating 8/10</p>
                <p class="text-gray-500 font-medium text-xl mb-4">IDR.50.000</p>
                <hr />
                <p class="text-gray-600 font-medium mt-4">Description</p>
                <p
                    class="text-gray-400 text-justify"
                >Lorem, ipsum dolor sit amet consectetur adipisicing elit. Temporibus ullam voluptatum commodi dignissimos, quas vero laborum odio ipsam saepe laudantium eius deleniti quod impedit consequatur dolore quae? Error dolor nisi reprehenderit adipisci totam nostrum harum ab voluptate, magni quia, omnis consequuntur accusantium animi, dolorem consequatur maxime deleniti sint repellat temporibus illum? Totam assumenda corrupti eligendi! Veniam illo obcaecati in, quibusdam corrupti consequuntur, expedita corporis ullam impedit aliquid dicta ratione, et iusto ipsum distinctio laboriosam veritatis nulla doloremque. Vitae, a inventore qui expedita explicabo sunt voluptatibus aspernatur rerum adipisci officiis dolore, reiciendis veritatis doloribus accusantium ipsam! Magni consequatur iusto nostrum quidem.</p>

                <a
                    href="#"
                    class="block w-full px-2 py-4 bg-blue-500 text-center rounded text-white mt-16"
                >Add To Chart</a>
            </div>
        </div>
        <Footer />
    </div>
</template>

<script>
import Header from "../components/Header";
import Footer from "../components/Footer";
export default {
    components: {
        Header,
        Footer,
    },
};
</script>