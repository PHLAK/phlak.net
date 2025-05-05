import { defineConfig } from 'vite';
import tailwindcss from '@tailwindcss/vite'

export default defineConfig({
    cacheDir: '.cache/vite',
    plugins: [
        tailwindcss(),
    ],
});
