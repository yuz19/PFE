const searchd = () =>{
    const searchbox =document.getElementById( "search-items").value.toUpperCase();
    
    const list=document.querySelectorAll(".eleve_info");
   
    const lname=document.querySelectorAll(".info_elev");
        console.log(list);
    for(var i=0;i<lname.length;i++){
      let match=list[i].getElementsByClassName('info_elev')[0];
  
      if(match){
       let textvalue=match.textContent ||match.innerHTML;
       if(textvalue.toUpperCase().indexOf(searchbox)>-1){
         list[i].style.display="";
       }else{
         list[i].style.display="none";
        }
        }
        
      }
    }