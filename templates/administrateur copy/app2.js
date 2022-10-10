
const back4=document.querySelector('.back4')
const form=document.querySelector('.form_etude')
const back5=document.querySelector('.back5')
const list=document.querySelector('.list')
 
var id = null;
back4.onclick=function(){
    
  back5.style.display="block" 
  form.style.display="block"
    list.style.display="none"  
    back4.style.display="none"
   
    
}
back5.onclick=function(){
  back5.style.display="none" 
  back4.style.display="block"
   
   form.style.display="none"
  list.style.display="block"
}

 