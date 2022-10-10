/*list ou block*/
let square=document.querySelector('.l');
let sqative=document.querySelector('.btnacti');
let lis=document.querySelector('.r')
let lisive=document.querySelector('.btnacti');
let cours=document.querySelector('.cont_cour');

let infcour=document.querySelectorAll('.cour');
square.style.background="#c5c2c2"; 
square.onclick=function(){
    

    square.classList.add('btnacti');
    lis.classList.remove('btnacti');
    square.style.background='';
    lis.style.background='#c5c2c2';
    cours.classList.add('cont_cour2');
    

    for(var i=0;i<infcour.length;i++){
            infcour[i].classList.add('cour2');
            infcour[i].classList.remove('cour');

        }
} 
lis.onclick=function(){

        square.classList.remove('btnacti');
        lis.classList.add('btnacti');
        square.style.background='#c5c2c2';
        lis.style.background='';
        cours.classList.remove('activate');
        cours.classList.remove('cont_cour2');
        cours.classList.add('cont_cour')
        

    for(var i=0;i<infcour.length;i++){
            infcour[i].classList.remove('cour2');
            infcour[i].classList.add('cour');

        }
} 

