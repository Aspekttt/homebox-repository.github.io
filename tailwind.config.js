import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },

            fontSize: {
                '12px': '12px',
                '14px': '14px',
                '16px': '16px',
                '18px': '18px',
                '20px': '20px',
                '22px': '22px',
                '24px': '24px',
                '28px': '28px',
                '32px': '32px',
                '38px': '38px',
                '42px': '42px',
            },
        },
    },

    plugins: [forms],
};
