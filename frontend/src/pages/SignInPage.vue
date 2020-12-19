<template>
    <div class="mx-auto justify-center flex mt-24">
        <div class="p-4 border rounded w-2/5">
            <p class="text-center text-xl mb-8 text-gray-700">Sign In Page</p>
            <input
                v-model="email"
                class="p-2 bg-gray-200 w-full rounded focus:outline-none"
                placeholder="Email"
            />
            <input
                v-model="password"
                class="mt-4 p-2 bg-gray-200 w-full rounded focus:outline-none"
                type="password"
                placeholder="Password"
            />
            <button @click="signIn" class="mt-8 p-2 bg-blue-500 w-full text-white rounded">Sign In</button>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            email: "",
            password: "",
        };
    },
    methods: {
        async signIn() {
            // validation
            if (this.email == "") {
                return;
            }
            if (this.password == "") {
                return;
            }

            var response = await this.callApi("post", "user/login", {
                email: this.email,
                password: this.password,
            });

            if (response.status != 200) {
                console.log("login failed");
                return;
            }

            localStorage.setItem("token", response.data.data.access_token);
            this.$router.push({ path: `/` });
        },
    },
};
</script>