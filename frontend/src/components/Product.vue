<template>
    <router-link
        :to="'/produk/'+id"
        class="product w-48 border rounded p-2 mr-2 hover:shadow-md cursor-pointer"
    >
        <img :src="image_url" class="h-44 w-44 object-cover" alt srcset />
        <p class="font-semibold text-blue-900">{{name}}</p>
        <p class="text-gray-500">IDR.{{price}}</p>
    </router-link>
</template>

<script>
export default {
    props: {
        image_url: String,
        name: String,
        price: String,
        id: Number,
    },
    data() {
        return {};
    },
};
</script>