/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./index.html", "./src/**/*.{vue,js,ts,jsx,tsx}"],
    theme: {
        extend: {
            colors: {
                primary: "#AA8B7A",
                darkbg: "#212A1E",
                overlay: "rgba(0, 0, 0, 0.5)",
            },
            fontFamily: {
                sansarabic: ["TheSansArabic", "sans-serif"],
                philosopher: ["Philosopher", "serif"],
            },
            spacing: {
                "150px": "150px",
                "35%": "35%",
                "70vh": "70vh",
            },
            borderRadius: {
                oval: "50% / 30%",
            },
            transitionProperty: {
                size: "width, height",
            },
        },
    },
    plugins: [require("@tailwindcss/line-clamp")],
};
