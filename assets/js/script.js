$(function(){
    var inicio = true;
        $("#filt1").click(function(){
            if(inicio == true){
                inicio = false;
                console.log(inicio);
          $(".filtwo").addClass("filtro1");
            //	$("#Cuadrado").css({"background-color":"#FF622C", "border-color":"#2980b9"});
            }
            else{
                inicio = true;
                console.log(inicio);
                $(".filtwo").removeClass("filtro1");
            }
        });

    
    $("#filt2").click(function(event){
        event.preventDefault();
        $("#filtrosCss").addClass("filtwo");

        $('#cuadrado').css('background', 'blue');
        //$("#parrafo").removeClass("negrita");
    });
    
});