/** @type {import('tailwindcss').Config} */
const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                transparent: 'transparent',
                gray: {
                    100: '#50597C',
                    200: '#2E3962',
                    300: '#F6F6F6',
                    400: '#DEDEDE',
                    500: '#373F4F',
                },
                pink: {
                    100: '#F2426C',
                    200: '#D0385C',
                    300: '#DF7C94',
                    400: '#df4142',
                },
                blue:{
                    100: '#0070EB',
                    200: '#0062CD',
                    300: '#075AB6',
                    400: '#0070eb'
                },
                yellow:{
                    100: '#FFE600',
                },
            },
            spacing: {
                '18': '18px',
                '222': '222px'
            },
            screens: {
                '2ssm': '420px',
                '2sm': '641px',
                'laptop': '1366px',
                '2smm': '1400px',
                '2xxl': '1840px',
                'full': '1921px',
            },
            fontSize: {
                '2xxl': '22px',
                '2xxll': '26px',
                '2xxxl': '28px',
                '5xxl': '58px',
            },
            lineHeight: {

            },
            maxWidth: {
                container: '1450px',
                list: '200px',
                instruction: '930px',
                login: '470px',
            },
            fontFamily: {
                circe: ['Circe', 'sans-serif'],
                geometria: ['Geometria', 'sans-serif'],
                helvetica: ['HelveticaNeueCyr', 'sans-serif'],
            },
            borderRadius: {
                '50': '50px'
            }
        },
    },
    plugins: [require('@tailwindcss/forms')],
}
