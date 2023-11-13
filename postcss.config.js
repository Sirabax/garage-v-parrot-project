// postcss.config.js
const purgecss = require("@fullhuman/postcss-purgecss");

module.exports = {
  plugins: [
    purgecss({
      content: ["./templates/*.twig"], // Ajoutez le chemin vers vos fichiers Twig
    }),
    // Ajoutez d'autres plugins PostCSS si nécessaire
  ],
};
