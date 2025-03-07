module.exports = {
  mode: "jit",
  content: ["./**/*.php", "./src/**/*.js"],
  darkMode: "class",
  safelist: [
    'text-green-500',
    'text-red-500',
    'rotate-180',
    'text-red-700',
    'text-orange-700',
    'text-amber-700',
    'text-yellow-700',
    'text-lime-700',
    'text-green-700',
    'text-emerald-700',
    'text-teal-700',
    'text-cyan-700',
    'text-sky-700',
    'text-blue-700',
    'text-indigo-700',
    'text-violet-700',
    'text-purple-700',
    'text-fuchsia-700',
    'text-pink-700',
    'text-rose-700',
    'text-gray-700',
    'text-red-600',
    'text-orange-600',
    'text-amber-600',
    'text-yellow-600',
    'text-lime-600',
    'text-green-600',
    'text-emerald-600',
    'bg-red-100',
    'bg-orange-100',
    'bg-amber-100',
    'bg-yellow-100',
    'bg-lime-100',
    'bg-green-100',
    'bg-emerald-100',
    'bg-teal-100',
    'bg-cyan-100',
    'bg-sky-100',
    'bg-blue-100',
    'bg-indigo-100',
    'bg-violet-100',
    'bg-purple-100',
    'bg-fuchsia-100',
    'bg-pink-100',
    'bg-rose-100',
    'bg-red-50',
    'bg-orange-50',
    'bg-amber-50',
    'bg-yellow-50',
    'bg-lime-50',
    'bg-green-50',
    'bg-emerald-50',
    'bg-gray-100',
    'bg-red-500'
  ],
  theme: {
    zIndex: {
      1: 1,
      2: 2,
      10: 10,
    },
    listStyleType: {
      auto: "auto",
      none: "none",
      disc: "disc",
      decimal: "decimal",
      square: "square",
    },
    container: {
      center: true,
      padding: "15px",
    },
    extend: {
      lineHeight: {
        12: "3rem",
        16: "4rem",
      },
      colors: {
        "main-dark": "#202020",
        "main-gray": "#f5f5f5",
        "main-blue": "#3949ab",
        "main-border": "#ebebeb",
        "custom-gray": "#e5e7ec",
        "custom-yellow": "#ecc31f",
        primary: "#6266f0",
      },
      fontSize: {
        // '20xl': '20rem'
      },
      fontFamily: {
        heading: "Playfair Display",
        text: ["Nunito"],
        subtitle: ["Noto Sans"],
        title: ["Shantell Sans"],
        inter: ["Inter Tight"],
      },
    },
  },
  variants: {
    extend: {},
  },
  // plugins: [require('@tailwindcss/typography')],
};
