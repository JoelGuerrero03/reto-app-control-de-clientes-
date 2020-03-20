eventListeners();

function eventListeners() {
    document.querySelector('#formulario').addEventListener('submit', validarRegistro);
}

function validarRegistro(e) {
    e.preventDefault();

    var usuario = document.querySelector('#usuario').value,
        password = document.querySelector('#password').value,
        tipo = document.querySelector('#tipo').value;

    if (usuario === '' || password === '') {
        //la validacion fallo
        swal({
            type: 'error',
            title: 'Error!',
            text: 'Ambos campos son obligatorios!',
        })
    } else {
        //Ambos campos son correscto, mandar ejecutar ajax

        //datos que se envian al servidor
        var datos = new FormData();
        datos.append('usuario', usuario);
        datos.append('password', password);
        datos.append('accion', tipo);

        //crear el llamado a ajax
        var xhr = new XMLHttpRequest();

        //abrir la conexion
        xhr.open('POST', '../../reto(app control de clientes)/includes/modelos/modelo-admin.php', true);

        //retorno de datos
        xhr.onload = function() {
                if (this.status === 200) {
                    var respuesta = JSON.parse(xhr.responseText);

                    console.log(respuesta);
                    //si la respuesta es correcta
                    if (respuesta.respuesta === 'correcto') {
                        if (respuesta.tipo === 'login') {
                            swal({
                                    type: 'success',
                                    title: 'Login Correcto',
                                    text: 'Presiona OK para abrir el dashboard'
                                })
                                .then(resultado => {
                                    if (resultado.value) {
                                        window.location.href = 'index.php';
                                    }
                                })
                        }
                    } else {
                        //Hubo un error
                        swal({
                            type: 'error',
                            title: 'error',
                            text: 'Hubo un error'
                        });
                    }
                }
            }
            //enviar la peticion
        xhr.send(datos);


    }



}