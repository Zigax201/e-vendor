<template>
    <div class="mx-auto justify-center flex mt-24">
        <div class="p-4 border rounded w-2/5">
            <p class="text-center text-xl mb-8 text-gray-700">Sign Up Page</p>
            <input
                v-model="user.name"
                class="p-2 bg-gray-200 w-full rounded focus:outline-none"
                placeholder="Fullname"
            />
            <input
                v-model="user.email"
                class="mt-4 p-2 bg-gray-200 w-full rounded focus:outline-none"
                placeholder="Email"
            />
            <input
                v-model="user.phone_number"
                class="mt-4 p-2 bg-gray-200 w-full rounded focus:outline-none"
                placeholder="Phone Number"
            />
            <input
                v-model="user.password"
                class="mt-4 p-2 bg-gray-200 w-full rounded focus:outline-none"
                type="password"
                placeholder="Password"
            />
            <button
                @click="register()"
                :disabled="isLoading"
                class="mt-8 p-2 bg-blue-500 w-full text-white rounded"
            >Register</button>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            isLoading: false,
            user: {
                name: null,
                email: null,
                password: null,
                password_confirmation: null,
                phone_number: null,
            },
        };
    },

    methods: {
        async register() {
            this.isLoading = true;
            this.user.password_confirmation = this.user.password;

            var response = await this.callApi(
                "post",
                "user/register",
                this.user
            );

            if (response.status != 200) {
                this.isLoading = false;
                return;
            }

            localStorage.setItem("token", response.data.data.access_token);
            this.isLoading = false;
            this.$router.push({ path: `/` });
        },
    },
};
</script>