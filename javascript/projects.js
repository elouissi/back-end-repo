
var btnmodal = document.getElementById("btnmodal");
var modal = document.getElementById("modal");
var close = document.getElementById("close-modal");

// les offres

var modal_doffre = document.getElementById("modal_d'offre") ;
var button_offre = document.getElementById("button_offre");


 
 


btnmodal && btnmodal.addEventListener("click",() =>{

    modal.classList.toggle("hidden")
})
close && close.addEventListener("click",() =>{

    modal.classList.toggle("hidden")
})
button_offre && button_offre.addEventListener("click",() =>{
 
     

    modal_doffre.classList.toggle("hidden")
})
 
 
