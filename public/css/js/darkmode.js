document.addEventListener("DOMContentLoaded", () => {
    const body = document.body;
    const toggle = document.getElementById("darkToggle");

    // Cargar modo guardado
    if (localStorage.getItem("dark") === "true") {
        body.classList.add("dark");
    }

    toggle.addEventListener("click", () => {
        body.classList.toggle("dark");

        // Guardar estado
        localStorage.setItem("dark", body.classList.contains("dark"));
    });
});
