$(document).ready(function() {

    $('#login').click(function() {

        $.ajax({
            type: "POST",
            url: 'validacion.php',
            data: {
                usercodigo: $("#usercodigo").val()
            },
            success: function(data)
            {
                console.log(data);
                if (data === 'ok') {
                    window.location.replace('home.php');
                }
                else {
                    $("#error").fadeOut();
                    $("#error").html('holaaa')
                }
            }
        });

    });

});
//Evento que muestra el fotmulario Evaluados  
    $('#linkeva').click(function() {

        $.ajax({
            type: "POST",
            url: 'listaestudiantes.php',
            data: {
                evadato: $("#evadato").val()
            },
            success: function(data)
            {
                console.log(data);
                if (data) {
                    $('#contenido').html(data);
                    //window.location.replace('home.php');
                }
                else {
                    $("#error").fadeOut();
                    $("#error").html('holaaa')
                }
            }
        });
    });
//Muestra la lista PE    
$('#linkpe').click(function() {

        $.ajax({
            type: "POST",
            url: 'listaestudiantes.php',
            data: {
                evadato: $("#evadatope").val()
            },
            success: function(data)
            {
                if (data) {
                    $('#contenido').html(data);
                    //window.location.replace('home.php');
                }
                else {
                    $("#error").fadeOut();
                    $("#error").html('holaaa')
                }
            }
        });
   });
   
 //Evento que muestra el fotmulario                                                                            
   $('#linkevaluar').click(function() {
        $.ajax({
            type: "POST",
            url: 'formulario.php',
            success: function(data)
            {
                if(data){
                    console.log(data);
                    $('#contenido').html(data);
                }else {
                    $("#error").fadeOut();
                    $("#error").html('holaaa')
                }
            }
        });
   });
// evento que fuarda la información de l formulario    
    $('#enviarform').click(function() {

        $.ajax({
            type: "POST",
            url: 'ActualizaForm.php',
            data: {
                dato: $("#formulario").serialize()
            },
            success: function(data)
            {
                if (data) {
                    console.log(data);
                    $('#mensaje').html(data);
                   // window.location.replace('home.php');
                }
                else {
                    $("#error").fadeOut();
                    $("#error").html('holaaa')
                }
            }
        });
   });
