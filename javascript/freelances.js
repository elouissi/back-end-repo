
var btn = document.getElementById("btnmodal")
var x =document.getElementById("close-modal")
var last =document.getElementById("last_btn_close")
var list = document.getElementById("default-modal")
 
    btn.addEventListener("click",()=>{
    
        
     
    list.classList.toggle("hidden")

})
 x.addEventListener("click", ()=>{

 
    list.classList.toggle("hidden")

 })
 last.addEventListener("click", ()=>{

 
    list.classList.toggle("hidden")

 })