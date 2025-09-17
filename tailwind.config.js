/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
    ],
    theme: {
        extend: {
            fontFamily: {
                pj: ["Plus Jakarta Sans", "sans-serif"],
                inter: ["Inter", "sans-serif"],
            },
            backgroundImage: {
                "gradient-custom":
                    "linear-gradient(90deg, #44BCFF 0%, #FF44EC 50%, #FF675E 100%)",
            },
        },
    },
    plugins: [],
};
