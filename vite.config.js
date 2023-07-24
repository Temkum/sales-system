import { defineConfig } from "vite";
import laravel, { refreshPaths } from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: [...refreshPaths, "app/Http/Livewire/**"],
        }),
    ],
    optimizeDeps: {
        include: ["postcss", "axios"], // Add explicit dependencies that Vite should include
    },
    rollupOptions: {
        input: ["resources/css/app.css", "resources/js/app.js"],
    },
});
