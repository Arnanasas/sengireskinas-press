module.exports = {
  purge: ["./**/*.html", "./**/*.js"],
  theme: {
    extend: {
      colors: {
        primary: {
          green: "#C8F27E",
        },
        danger: "#ef4444", // Red
        success: "#22c55e", // Green
        warning: "#facc15", // Yellow
        info: "#3b82f6", // Blue
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
