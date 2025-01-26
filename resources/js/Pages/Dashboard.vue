<template>
    <div
        class="min-h-screen bg-gray-100 flex flex-col items-center justify-center"
    >
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-md text-center">
            <h1 class="text-3xl font-bold text-gray-700 mb-4">
                Welcome to the Dashboard
            </h1>
            <p class="text-gray-600 mb-6">
                You are logged in! Use the navigation bar to explore.
            </p>
            <button
                @click="logout"
                class="bg-red-500 text-white py-2 px-4 rounded-lg hover:bg-red-600 transition"
            >
                Logout
            </button>
        </div>
    </div>
</template>

<script>
import { router } from "@inertiajs/vue3";

export default {
    setup() {
        const logout = () => {
            router.post("/logout");
        };

        return { logout };
    },
};
</script>
