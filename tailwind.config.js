/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./public/**/*.{html,js,php}' , './node_modules/flowbite/**/*/js'],
  theme: {
    extend: {
      fontFamily: {
        mainFont: ['Josefin Sans'],
        second: ['WadeSans', 'sans-serif'],
        third: ['CaviarDreams', 'sans-serif'],
      } 
    },
  },
  variants: {
   extends: {
      display : ['group-focus'],
      opacity : ['group-focus'],
      inset : ['group-focus']
   },
  },
  plugins: [
    require('flowbite/plugin')
  ],
}

