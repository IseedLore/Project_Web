document.addEventListener("DOMContentLoaded", function () {
    // Seleziono gli elementi del DOM necessari
    const form = document.getElementById("home-form");
    const selectVisualizza = document.getElementById("visualizza");
    const containerCorsi = document.getElementById("container-corsi");
    const containerCheckbox = document.getElementById("container-checkbox");

    function gestisciForm() {
        const valore = selectVisualizza.value;

        if (valore === "corsi") {
            containerCorsi.style.display = "block";   
            containerCheckbox.style.display = "none"; 
            form.action = "corsi.php";
        } else if (valore === "miei" || valore === "tutti") {
            containerCorsi.style.display = "none";
            containerCheckbox.style.display = "block"; 
            form.action = "gruppi.php";
        }
    }

    gestisciForm();

    selectVisualizza.addEventListener("change", gestisciForm);
});