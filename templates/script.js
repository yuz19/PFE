 /*slider */
 let public_slid=document.getElementsByClassName('slide');
 
 let etape=0;
 let nbr_public=public_slid.length;
function enleverImage (){
    for(let i=0;i<nbr_public;i++){
        public_slid[i].classList.remove('active');
    }

}

let precedent=document.querySelector('.precedent');
let suivant=document.querySelector('.suivant');
suivant.onclick=function (){
    etape++;
    if(etape>=nbr_public){
        etape=0;
        public_slid[etape].classList.add('active');
     
    }
    enleverImage();
    public_slid[etape].classList.add('active');
 
}
precedent.onclick=function (){
    
    if(etape>0){   
    enleverImage();
    etape--;
    public_slid[etape].classList.add('active');}
    else{
        enleverImage();
        etape=nbr_public-1;
        public_slid[etape].classList.add('active');
    }
}

 
