

function pagoOnChange(sel) {
    if(sel.value == 'P'){
        $("#codigopro").hide();
     }else{
       $("#codigopro").show();
     }   
}

// Add Record
function addRecord() {
    // get values
    var codigo = $("#codigo").val();
    var nombre = $("#nombre").val();
    var tipo = $("#tipo").val();
    var email = $("#email").val();
    var codigoprofesor = $("#codigoprofesor").val();

    // Add record
    $.post("administrador/ajax/addRecord.php", {
        codigo: codigo,
        nombre: nombre,
        tipo: tipo,
        email: email,
        codigoprofesor: codigoprofesor
    }, function (data, status) {
        // close the popup

        $("#add_new_record_modal").modal("hide");
        $(".modal-backdrop").hide();
       

        // read records again
        readRecords();

        // clear fields from the popup
        $("#codigo").val("");
        $("#nombre").val("");
        $("#tipo").val("");
        $("#email").val("");
    });
}

// READ records
function readRecords() {
    $.get("administrador/ajax/readRecords.php", {}, function (data, status) {
        $(".records_content").html(data);
    });
}


function DeleteUser(id) {
    var conf = confirm("Are you sure, do you really want to delete User?");
    if (conf == true) {
        $.post("administrador/ajax/deleteUser.php", {
                id: id
            },
            function (data, status) {
                // reload Users by using readRecords();
                readRecords();
            }
        );
    }
}

function GetUserDetails(id) {
    // Add User ID to the hidden field for furture usage
    $("#hidden_user_id").val(id);
    $.post("administrador/ajax/readUserDetails.php", {
            id: id
        },
        function (data, status) {
            // PARSE json data
            console.log(data);
            var user = JSON.parse(data);
            $.each( user, function( key, value ) {
              // Assing existing values to the modal popup fields
                $("#update_codigo").val(value.Codigo);
                $("#update_nombre").val(value.Nombres);
                $("#update_email").val(value.Email);
                $("#update_estado").val(value.CorreoEnviado);
            })
            
            
        }
    );
    // Open modal popup
    $("#update_user_modal").modal("show");
}

function UpdateUserDetails() {
    // get values
    var codigo = $("#update_codigo").val();
    var nombre = $("#update_nombre").val();
    var email  = $("#update_email").val();
    var estado = $("#update_estado").val();

    // get hidden field value
    var id = $("#hidden_user_id").val();

    // Update the details by requesting to the server using ajax
    $.post("administrador/ajax/updateUserDetails.php", {
            id: id,
            codigo: codigo,
            nombre: nombre,
            email: email,
            estado: estado
        },
        function (data, status) {
            // hide modal popup
            $("#update_user_modal").modal("hide");
            // reload Users by using readRecords();
            readRecords();
        }
    );
}


    
