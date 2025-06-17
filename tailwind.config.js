/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue", // If you're using Vue components
    // Add other paths if you have components in different directories
  ],
  theme: {
    extend: {
        fontFamily: {
            sans: ['Instrument Sans', 'ui-sans-serif', 'system-ui', 'sans-serif'],
       },
    },
  },
  plugins: [],
};

