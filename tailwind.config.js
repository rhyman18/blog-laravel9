/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.{html,js,php}",
    "./resources/**/*.{html,js,php}",
    "./resources/**/*.vue"
  ],
  theme: {
    extend: {
      fontFamily: {
        'sans': ['Poppins', 'sans-serif'],
      },
      colors: {
        'ungu': '#B1B2FF',
        'ungupudar': '#AAC4FF',
        'pudarungu': '#D2DAFF',
        'pudar': '#EEF1FF',
        'hijau': '#B3FFAE',
        'merah': '#FF7D7D',
        'putih': '#FFFFFF',
        'hitam': '#000000',
        'hitampudar': '#2F2F2F',
        'biru': '#4267B2',
        'oren': '#DBB632',
      },
    },
  },
  plugins: [],
}

