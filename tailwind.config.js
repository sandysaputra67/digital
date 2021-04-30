const colors = require('tailwindcss/colors');

module.exports = {
    purge: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    darkMode: false, // or 'media' or 'class'
    theme: {
        extend: {
            zIndex: {
                '-10': '-10'
            }
        },
        colors: {
            transparent: 'transparent',
            current: 'currentColor',
            white: colors.white,
            black: colors.black,
            gray: colors.coolGray,
            'theme-primary': {
                darkest: 'var(--theme-primary-darkest)',
                darker: 'var(--theme-primary-darker)',
                dark: 'var(--theme-primary-dark)',
                DEFAULT: 'var(--theme-primary)',
                light: 'var(--theme-primary-light)',
                lighter: 'var(--theme-primary-lighter)',
                lightest: 'var(--theme-primary-lightest)',
            }
        }
    },
    variants: {
        extend: {},
    },
    plugins: [],
}
