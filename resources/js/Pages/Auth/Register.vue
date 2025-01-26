<template>
    <div
        class="min-h-screen flex flex-col justify-center items-center bg-gray-50"
    >
        <div class="w-full max-w-md bg-white p-6 rounded-lg shadow-lg">
            <h1 class="text-2xl font-bold text-center text-gray-700 mb-4">
                Register
            </h1>
            <form @submit.prevent="submit">
                <div class="mb-4">
                    <label
                        for="name"
                        class="block text-sm font-medium text-gray-700"
                        >Name</label
                    >
                    <input
                        id="name"
                        type="text"
                        v-model="form.name"
                        class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter your name"
                    />
                </div>
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
                        class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter your email"
                    />
                </div>
                <div class="mb-4">
                    <label
                        for="password"
                        class="block text-sm font-medium text-gray-700"
                        >Password</label
                    >
                    <input
                        id="password"
                        type="password"
                        v-model="form.password"
                        class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Create a password"
                    />
                </div>
                <button
                    type="submit"
                    class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition"
                >
                    Register
                </button>
            </form>
            <div class="mt-4 text-center">
                <p class="text-sm text-gray-600">
                    Already have an account?
                    <a href="/login" class="text-blue-600 hover:underline"
                        >Login</a
                    >
                </p>
            </div>
        </div>
    </div>
</template>

<script>
import { useForm } from "@inertiajs/vue3";

export default {
    setup() {
        const form = useForm({
            name: "",
            email: "",
            password: "",
        });

        const submit = () => {
            form.post("/register"); // Adjust the endpoint based on your backend route
        };

        return { form, submit };
    },
};
</script>
