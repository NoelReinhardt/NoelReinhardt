/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./public/**/*.{html,js,php}' , './node_modules/flowbite/**/*/js'],
  theme: {
    extend: {
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

