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


var filtersButton = document.getElementById("filters-button");

if(filtersButton!=null){
    filtersButton.addEventListener("click", function(){
        groupsAside = document.getElementById("groups-aside");

        if(groupsAside.style.display=="none"){
            groupsAside.style.display = "block";
        } else{
            groupsAside.style.display = "none";
        }
    });
}