
//Codigo JavaScript para la variable "email" en Ajax
$("#email").change(function() {

    var email = $(this).val();
    //console.log("email", email);

    var datos = new FormData();
    datos.append("validarEmail", email);

    $.ajax({

        url:"ajax/formularios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        
        success: function(respuesta) {
            console.log("respuesta", respuesta);
        }

    });

})