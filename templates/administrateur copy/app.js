const back2=document.querySelector('.back2')
const back3=document.querySelector('.back3')
const slider=document.querySelector('.slider')
const form=document.querySelector('.top-acceuil')
var id = null;
back2.onclick=function(){
    slider.style.display="block"
    
    back3.style.display="block"
    form.style.display="none"
    var pos = -50;
    clearInterval(id);
    id = setInterval(frame, 10);
    function frame() {
      if (pos >= 5) {
        clearInterval(id);
      } else {
         pos=pos+2; 
        slider.style.top = pos + '%'; 
        
      }
    }
    
}
back3.onclick=function(){
    slider.style.display="block"
    form.style.display="block"
    back3.style.display="none"
    var pos = 0;
    clearInterval(id);
    id = setInterval(frame, 10);
    function frame() {
      if (pos < -1200) {
        clearInterval(id);
      } else {
         pos=pos-60; 
        slider.style.top = pos + 'px'; 
        
      }
    }
    
}

 