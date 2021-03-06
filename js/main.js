$(document).ready(function() {
    $('#guardar-registro').on('submit', function(e) {
        e.preventDefault();
        var datos = $(this).serializeArray();
        console.log(datos);
        $.ajax({
            type: $(this).attr('method'),
            data: datos,
            url: $(this).attr('action'),
            dataType: 'json',
            success: function(data) {
                console.log(data);
                var resultado = data;
                if (resultado.respuesta == 'exito') {
                    swal(
                        'Correcto',
                        'Se guardó correctamente',
                        'success'
                    )
                } else {
                    swal(
                        'Error!',
                        'Hubo un error',
                        'error'
                    )
                }
            }
        })
    });
});