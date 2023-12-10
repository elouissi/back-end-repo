 
var offer_btn = document.getElementById("offer_btn");
var offer_modal =document.getElementById("offer_modal");
var close_modal =document.getElementById("close_modal");

offer_btn.addEventListener("click",()=>{
    
    offer_modal.classList.toggle("hidden")
})
close_modal.addEventListener("click",()=>{
    
    offer_modal.classList.toggle("hidden")
})
 