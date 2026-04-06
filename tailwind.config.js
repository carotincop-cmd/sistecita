/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: 'class', // ← obligatorio para toggle por clase
  content: [
    './resources/views/**/*.blade.php',
    './resources/js/**/*.js',
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}