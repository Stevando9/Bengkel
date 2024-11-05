/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        primary:'#FFEE00',
        second:'#1D1D1D',
        anomaly:'#696969',
      }
    },
  },
  plugins: [],
}

