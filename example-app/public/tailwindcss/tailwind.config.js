module.exports = {
    // mode: "jit",
    purge: [
        "./public/**/*.html",
        "./src/**/*.{js,jsx,ts,tsx,vue}",
        "./css/**/*.{js,jsx,ts,tsx,vue}",
        "./src/pages/**/*.{html,js}",
        "./src/components/**/*.{html,js}",
        "./src/layouts/**/*.{html,js}",
        "./src/index.html",
    ],
    darkMode: false, // or 'media' or 'class'
    theme: {
        color: {
            cam: "#f26b38",
        },
        backgroundColor: (theme) => ({
            ...theme("colors"),
            camx: "#f26b38",
            secondary: "#ffed4a",
            danger: "#e3342f",
        }),
        extend: {},
    },
    variants: {
        extend: {
            backgroundColor: ["hover"],
        },
    },
    plugins: [],
};
