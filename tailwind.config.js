const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');

/** @type {import('tailwindcss').Config} */
module.exports = {
    corePlugins: {
        preflight: true
    },
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                transparent: 'transparent',
                current: 'currentColor',
                black: colors.black,
                white: colors.white,
                gray: colors.neutral,
                'gray-background': '#f7f8fc',
                'blue': '#328af1',
                'blue-hover': '#2879bd',
                'yellow': '#ffc73c',
                'red': '#ec454f',
                'green': '#1aab8b',
                'purple': '#8b60ed',
            },
            spacing: {
                8: '2rem',
                22: '5.5rem',
                70: '17.5rem',
                76: '19rem',
                104: '26rem',
                128: '32rem',
                175: '43.75rem',
            },
            maxWidth: {
              custom: '68.5rem',
            },
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
                ptsans: ['"PT Sans"'],
                jsone: ['"Julius Sans One"'],

            },
            fontSize: {
                xxs: ['0.625rem', { lineHeight: '1rem'}],
            }
        },
    },


    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
        require('@tailwindcss/aspect-ratio'),
    ],

};
