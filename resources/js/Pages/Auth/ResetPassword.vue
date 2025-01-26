<template>
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="w-full max-w-md bg-white p-6 rounded-lg shadow">
            <h2 class="text-xl font-bold mb-4">Reset Password</h2>
            <form @submit.prevent="resetPassword">
                <input type="hidden" v-model="form.token" />
                <div class="mb-4">
                    <label
                        for="email"
                        class="block text-sm font-medium text-gray-700"
                        >Email</label
                    >
                    <input
                        id="email"
                        type="email"
                        v-model="form.email"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm"
                        required
                    />
                </div>
                <div class="mb-4">
                    <label
                        for="password"
                        class="block text-sm font-medium text-gray-700"
                        >New Password</label
                    >
                    <input
                        id="password"
                        type="password"
                        v-model="form.password"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm"
                        required
                    />
                </div>
                <div class="mb-4">
                    <label
                        for="password_confirmation"
                        class="block text-sm font-medium text-gray-700"
                        >Confirm Password</label
                    >
                    <input
                        id="password_confirmation"
                        type="password"
                        v-model="form.password_confirmation"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm"
                        required
                    />
                </div>
                <button
                    type="submit"
                    class="w-full bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600"
                >
                    Reset Password
                </button>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    props: ["token", "email"],
    data() {
        return {
            form: {
                token: this.token,
                email: this.email || "",
                password: "",
                password_confirmation: "",
            },
        };
    },
    methods: {
        async resetPassword() {
            try {
                const response = await this.$inertia.post(
                    "/reset-password",
                    this.form
                );
                console.log("Password reset successful:", response);
            } catch (error) {
                console.error("Password reset failed:", error);
            }
        },
    },
};
</script>
