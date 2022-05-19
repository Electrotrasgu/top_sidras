/*****MENU**********/
var menu=document.getElementById("menu");
var velo=document.getElementById("velo");
var btn_menu=document.getElementById("btn_menu");
var isShowing=false;
btn_menu.onclick=function(){
    
    if(isShowing){
        menu.style.right="-2000px";
        
        btn_menu.style.background="url(menu.png) no-repeat center";
        btn_menu.style.backgroundSize="20px";
        velo.style.display="none";
        isShowing=false;
    }else{
        menu.style.right="0";
        velo.style.display="block";
        btn_menu.style.background="url(close_menu.png) no-repeat center";
        btn_menu.style.backgroundSize="20px";
        isShowing=true;
        
    }
    
};



/*********************Estrellas*************************/
var stars_num= document.getElementsByClassName("stars");//obtenedor

var stars= document.getElementsByClassName("list_star");//establecedor

var i;
for (i = 0; i < stars_num.length; i++) {
    stars_num[i].innerHTML="&#9733;"; 
}












    

 
  


      













 
 
     
       
      
     
 
    
    



