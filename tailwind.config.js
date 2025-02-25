module.exports = {
  content: [
    "./*.php",
    "./**/*.php",
    "./resources/js/*.js",
    "./resources/css/*.css",
    "./safelist.txt",
  ],
  theme: {
    extend: {
      colors: {
        primary: {
          green: "#C8F27E",
        },
        danger: "#ef4444",
        success: "#22c55e",
        warning: "#facc15",
        info: "#3b82f6",
        white: "#ffffff",
        black: "#000000",
      },
      fontSize: {
        small: "9px",
        medium: "32px",
        large: "65px",
      },
      letterSpacing: {
        "3p": "0.03em",
        "5p": "0.05em",
      },
    },
    fontFamily: {
      owners: ["Owners", "sans-serif"],
      ownersNarrow: ["Owners Narrow", "sans-serif"],
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
};
