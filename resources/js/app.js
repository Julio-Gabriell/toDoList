import './bootstrap';

// resources/js/app.js

function toggleTheme() {
    const body = document.body;
    const currentTheme = body.getAttribute("data-bs-theme");
    const newTheme = currentTheme === "dark" ? "light" : "dark";
    body.setAttribute("data-bs-theme", newTheme);
    localStorage.setItem("theme", newTheme);
}

// Aplicar tema salvo ao carregar
document.addEventListener("DOMContentLoaded", () => {
    const savedTheme = localStorage.getItem("theme") || "light";
    document.body.setAttribute("data-bs-theme", savedTheme);
});

// Tornar a função global (opcional, para usar direto no HTML)
window.toggleTheme = toggleTheme;
