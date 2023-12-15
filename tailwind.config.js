/** @type {import('tailwindcss').Config} */

import tailWindForms from '@tailwindcss/forms'

export default {
    content: [
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],
    theme: {
        extend: {},
    },
    plugins: [
        tailWindForms
    ],
}

