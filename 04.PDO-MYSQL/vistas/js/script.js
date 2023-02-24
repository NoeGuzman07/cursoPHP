
//Codigo JavaScript para la variable "email" en Ajax
$("#email").change(function() {

    //Comando que ayuda a limpiar el mensaje de email repetido cuando se introduce un email nuevo
    $(".alert").remove();
    
    var email = $(this).val();
    //console.log("email", email);

    var datos = new FormData();
    datos.append("validarEmail", email);

    $.ajax({

        url: "ajax/formularios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",  
        success: function(respuesta) {
            
            //console.log("respuesta", respuesta);
            //Condicion para verificar que si el correo existe o no
            if(respuesta) {

                $("#email").val("");

                $("#email").parent().after(`

                    <div class="alert alert-warning">

                        <b>ERROR:</b>
                        El correo electronico ya existe, por favor introduzca otro diferente
                    
                    </div>

                `)

            }

        }

    });

})