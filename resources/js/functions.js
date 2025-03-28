document.addEventListener("DOMContentLoaded", () => {
    function toggleEntidad(headerElement) {

        const table = headerElement.closest('.entidad').querySelector('table');
        const thead = table.querySelector('thead');
        const tbody = table.querySelector('tbody');

        // Toggle thead and tbody visibility
        if (thead.style.display === "none" || thead.style.display === "") {
            thead.style.display = "table-header-group"; // Show thead
            tbody.style.display = "table-row-group"; // Show tbody
            headerElement.querySelector(".toggle-symbol").textContent = "-";
        } else {
            thead.style.display = "none"; // Hide thead
            tbody.style.display = "none"; // Hide tbody
            headerElement.querySelector(".toggle-symbol").textContent = "+";
        }
    }

    // Attach the function to the window object to make it globally accessible
    window.toggleEntidad = toggleEntidad;

    // Ensure all thead and tbody elements are initially hidden on page load
    document.querySelectorAll('thead.historialHead, tbody.content').forEach(element => {
        element.style.display = "none";
    });
});




