document.addEventListener("DOMContentLoaded", () => {
    function toggleEntidad(headerElement) {
        console.log("Toggle function called");
        const content = headerElement.nextElementSibling;
        console.log(content);

        if (content.style.display === "none" || content.style.display === "") {
            content.style.display = "block";
            headerElement.querySelector(".toggle-symbol").textContent = "-";
        } else {
            content.style.display = "none";
            headerElement.querySelector(".toggle-symbol").textContent = "+";
        }
    }

    // Attach the function to the window object to make it globally accessible
    window.toggleEntidad = toggleEntidad;
});



