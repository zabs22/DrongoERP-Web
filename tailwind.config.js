import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            // DrongoERP orange, matching the marketing site's buttons (--yellow-bg).
            colors: {
                brand: {
                    50: '#FFF6EC',
                    100: '#FDE8CF',
                    500: '#F08109',
                    600: '#D46F04',
                    700: '#A85805',
                },
                // Blue-black drongo plumage, used by the dashboard's glass theme.
                plumage: {
                    100: '#DCE3F7',
                    900: '#12204A',
                },
            },
        },
    },

    plugins: [forms, typography],
};
