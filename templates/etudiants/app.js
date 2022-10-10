const searchd = () =>{
  const searchbox =document.getElementById( "search-items").value.toUpperCase();
  
  const list=document.querySelectorAll(".cour");
 
  const lname=document.querySelectorAll(".info_cour");
      console.log(list);
  for(var i=0;i<lname.length;i++){
    let match=list[i].getElementsByClassName('info_cour')[0];

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