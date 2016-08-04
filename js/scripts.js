$(document).ready(function () {

    $('#login').click(function () {

        $.ajax({
            type: "POST",
            url: 'validacion.php',
            data: {
                usercodigo: $("#usercodigo").val()
            },
            success: function (data)
            {
                if (data === 'ok') {
                    window.location.replace('home.php');
                } else {
                    $("#error").fadeOut();
                    $("#error").html('holaaa')
                }
            }
        });

    });

});
//Evento que muestra el fotmulario Evaluados  
$('#linkeva').click(function () {

    $.ajax({
        type: "POST",
        url: 'listaestudiantes.php',
        data: {
            evadato: $("#evadato").val()
        },
        success: function (data)
        {
            
            if (data) {
                $('#contenido').html(data);
                
                //window.location.replace('home.php');
            } else {
                $("#error").fadeOut();
                $("#error").html('holaaa')
            }
        }
    });
});
//Muestra la lista PE    
$('#linkpe').click(function () {

    $.ajax({
        type: "POST",
        url: 'listaestudiantes.php',
        data: {
            evadato: $("#evadatope").val()
        },
        success: function (data)
        {
            if (data) {
                $('#contenido').html(data);
                //window.location.replace('home.php');
            } else {
                $("#error").fadeOut();
                $("#error").html('holaaa')
            }
        }
    });
});

//Evento que muestra el fotmulario                                                                            
$('#linkevaluar').click(function () {
    $.ajax({
        type: "POST",
        url: 'formulario.php',
        success: function (data)
        {
            if (data) {
                $('#contenido').html(data);
                $('.comentario').hide();
                $('.bottoncomentario').hide();
                $('.bottonform').show();
            } else {
                $("#error").fadeOut();
                $("#error").html('holaaa')
            }
        }
    });
});
// evento que fuarda la información de l formulario    
$('#enviarform').click(function () {
    $.ajax({
        type: "POST",
        url: 'ActualizaForm.php',
        data: $("#formulario").serialize(),
        success: function (data)
        {
            if (data) {
                $('#mensaje').html(data);
                $('#formulario').find('input, textarea, select').attr('disabled', 'disabled');
                $('#enviarform').attr('disabled', 'disabled');
                // window.location.replace('home.php');
            } else {
                $("#error").fadeOut();
                $("#error").html('holaaa')
            }
        }
    });
});

// evento que fuarda la información de l formulario    
$('#enviarcomentario').click(function () {
    $.ajax({
        type: "POST",
        url: 'ActualizaComentario.php',
        data: $("#formulario").serialize(),
        success: function (data)
        {
            if (data) {
                $('#mensaje').html(data);
                $('#formulario').find('input, textarea, select, button').attr('disabled', 'disabled');
                // window.location.replace('home.php');
            } else {
                $("#error").fadeOut();
                $("#error").html('holaaa')
            }
        }
    });
});
// evento que fuarda la información de l formulario    
$('#enviarcorreo').click(function () {
    $.ajax({
        type: "POST",
        url: 'ActualizaForm.php',
        data: {
            datocorreo: $( '#enviarcorreo').attr("id")
        },
        success: function (data)
        {
            if (data) {
                console.log(data);
                $('#contenido').html(data);
                //$('#mensaje').html(data);
            } else {
                $("#error").fadeOut();
                $("#error").html('holaaa')
            }
        }
    });
});

// evento que fuarda la información del formulario
$(".calificarm").click(function(){ // Al hacer clic en la función
     var num = $(this).attr('name');
     $.ajax({
        type: "POST",
        url: 'formulario.php',
        data: {
            datocodigo: $( '#codigocali'+num).val(),
            codigocest: $( '#codigocEST'+num).val()
        },
        success: function (data)
        {
            if (data) {
                $('#contenido').html(data);
                
                $('#formulario').find('input, textarea, select').attr('disabled', 'disabled');
                $('#enviarform').attr('disabled', 'disabled');
                $('.comentario').show();
                $('.bottoncomentario').show();
                $('.bottonform').hide();
                $('.comentariotext').attr('disabled', false);
                $('#codigoinfoest').attr('disabled', false);
                
                bottonform
                //$('#mensaje').html(data);
            } else {
                $("#error").fadeOut();
                $("#error").html('holaaa');
            }
        }
    });
    });
    
    $(".vercarm").click(function(){ // Al hacer clic en la función
     var num = $(this).attr('name');
     $.ajax({
        type: "POST",
        url: 'formulario.php',
        data: {
            datocodigo: $( '#codigocali'+num).val(),
            codigocest: $( '#codigocEST'+num).val()
        },
        success: function (data)
        {
            if (data) {
                $('#contenido').html(data);
                
                $('#formulario').find('input, textarea, select, button').attr('disabled', 'disabled');
                $('#enviarform').attr('disabled', 'disabled');
                $('.comentario').show();
                $('.bottoncomentario').hide();
                $('.bottonform').hide();
                //$('#mensaje').html(data);
            } else {
                $("#error").fadeOut();
                $("#error").html('holaaa');
            }
        }
    });
    });
//Evento que muestra que cierre session                                                                           
$('#cerrar').click(function () {
    $.ajax({
        type: "POST",
        url: 'Logout.php',
        success: function (data)
        {
            if (data) {
                $('#mensaje').html(data);
                window.location.replace('index.php');
            } else {
                $("#error").fadeOut();
                $("#error").html('holaaa')
            }
        }
    });
});
