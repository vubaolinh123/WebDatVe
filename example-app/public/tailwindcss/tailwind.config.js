module.exports = {
    // mode: "jit",
    // purge: ["../**/*.html", "../**/*.{js,jsx,ts,tsx,vue}"],
    purge: [],
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
