<template>
    <div>
        <nav class="bg-blue-600 p-4 text-white flex justify-between items-center">
            <div>
                <router-link to="/">E-Vendor</router-link>
            </div>
            <div>
                <div v-if="!auth">
                    <router-link to="/login" class="mr-8 bg-blue-500 px-4 py-2 rounded">Login</router-link>
                    <router-link to="/register" class="mr-4 bg-blue-500 px-4 py-2 rounded">Register</router-link>
                </div>
                <div v-else class="flex items-center">
                    <img
                        class="h-8 w-8 object-cover rounded-full"
                        :src="profile_photo_url"
                        alt
                        srcset
                    />
                    <p class="ml-4">{{name}}</p>
                </div>
            </div>
        </nav>
    </div>
</template>

<script>
export default {
    data() {
        return {
            auth: false,
            name: "",
            profile_photo_url: "",
        };
    },
    created() {
        this.fetchUser();
    },
    methods: {
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
                this.name = response.data.data.name;
                this.profile_photo_url = response.data.data.profile_photo_url;
            }
        },
    },
};
</script>