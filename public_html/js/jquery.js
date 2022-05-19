
/*******************Contact Form***********************/
$(".cont").click(function(){
     $("form input").each(function(i,itemInput){
        if( $(itemInput).val().length === 0 ){
           $(itemInput).addClass("error"); 
        }
    });
    
       if( $("input[name='email']").val().indexOf('@') === -1  ){
        $("input[name='email']").addClass("error");
        $(".txt_error").html("El email no es correcto");
    }else{
        $(".txt_error").html("Debes rellenar datos");
    }
    
    
        if( $("form input").hasClass("error") ){
        $(".txt_error").css("display","block");
    }else{
        $(".txt_ok").css("display","block");
    }
    

    
});

/**************backToTopButtom **************/

$(function(){
    $(".btn_top").hide();
    
    
    $(window).scroll(function(){
        if($(this).scrollTop() > 150 ){
            $(".btn_top").show();
        }else{
            $(".btn_top").hide();
        }
    });
    
    $(".btn_top").on("click", function(){
        $('html,body').animate({
            scrollTop:0
        },500);
    });
});

/*********************Slider***********************/
var images =['img/slider/pic1.png','img/slider/pic2.png','img/slider/pic3.png','img/slider/pic4.png'];
var i= 0;
var play = function(){
  if(i > images.lenght){
   i=0;    
  }
  $("#image").attr('src',images[i]);
  i++; 
  var timer = setTimeout('play()',2000);
};
$(function(){
    play();
});



$(document).ready(function() {

    $('.delete').click(function(){
        //Recogemos la id del contenedor padre
        var parent = $(this).parent().attr('id');
        //Recogemos el valor del servicio
        var service = $(this).parent().attr('data');

        var dataString = 'id='+service;

        $.ajax({
            type: "POST",
            url: "includes/rate_controller.php",
            data: dataString,
            success: function() {            
                $('#delete-ok').empty();
                $('#delete-ok').append('<div>Se ha eliminado correctamente el servicio con id='+service+'.</div>').fadeIn("slow");
                $('#'+parent).remove();
            }
        });
    });                 
}); 
