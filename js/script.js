
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

if(selectVisualizza != null){
    selectVisualizza.addEventListener("change", gestisciForm);
}



var filtersButton = document.getElementById("filters-button");

if(filtersButton!=null){
    filtersButton.addEventListener("click", (event)=>{
        const groupsAside = document.getElementById("groups-aside");
        groupsAsideStyle = window.getComputedStyle(groupsAside, null);
        console.log(groupsAsideStyle.display);

        if(groupsAsideStyle.display=="none"){
            groupsAside.style.display = "block";
        } else{
            groupsAside.style.display = "none";
        }
    });
}



var btnShowPrefList = document.getElementById("btn-show-pref-list");
var btnHidePrefList = document.getElementById("btn-hide-pref-list");

if(btnShowPrefList != null){
    btnShowPrefList.addEventListener("click", function(){
        list = document.getElementById("preferences-overlay-panel");
      
        list.style.display = "block";
        
    });
}

if(btnHidePrefList!=null) {
    btnHidePrefList.addEventListener("click", function(){
        list = document.getElementById("preferences-overlay-panel");
        
        list.style.display = "none";
        
    });
}


var newImg = document.getElementById("imgUtente");

if (newImg != null) {
    newImg.addEventListener("change", function(){
        this.form.submit();
    });
}