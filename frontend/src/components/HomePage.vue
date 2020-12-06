<template>
    <div>
        {{message}}
        <br />
        {{nama}}
        <input v-model="result" type="text" />
        <button @click="ubahnama()">click me!</button>
        <br />
        <ul class="tengah">
            <li v-for="orang in data" :key="orang">{{orang.nama}}</li>
        </ul>
        {{fromapi}}
    </div>
</template>

<style lang="css">
.tengah {
    text-align: center;
    margin: auto;
    width: 10px;
}
</style>

<script>
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
};
</script>