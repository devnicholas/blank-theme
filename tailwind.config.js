module.exports = {
  content: [
    './tailwind.css',
    './header.php',
    './footer.php',
    './index.php',
    './404.php',
    './single.php',
    './page.php',
    './category.php',
    './archive.php',
    './woocommerce.php',
    './sidebar.php',
    './template-parts/**/*.php',
    './pages/**/*.php',
    './contents/**/*.php',
    './components/**/*.php',
    './woocommerce/**/*.php',
  ],
  theme: {
    extend: {
      colors: {
				primary: {
          light: '#a0cbcb',
          default: '#2d7070'
        },
				secondary: "#ffbd59",
			},
    },
  },
  variants: {
    extend: {},
  },
  corePlugins: {
		container: false,
	},
  plugins: [
    function ({ addComponents }) {
      addComponents({
        ".container": {
          width: "100%",
          marginLeft: "auto",
          marginRight: "auto",
          // paddingLeft: '2rem',
          // paddingRight: '2rem',
          "@screen sm": {
            maxWidth: "640px",
          },
          "@screen md": {
            maxWidth: "768px",
          },
          "@screen lg": {
            maxWidth: "80%",
          },
          "@screen xl": {
            maxWidth: "80%",
          },
        },
      });
    },
  ],
}
