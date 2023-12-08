
var btnmodal = document.getElementById("btnmodal");
var modal = document.getElementById("modal");
var close = document.getElementById("close-modal")
btnmodal.addEventListener("click",() =>{

    modal.classList.toggle("hidden")
})
close.addEventListener("click",() =>{

    modal.classList.toggle("hidden")
})
