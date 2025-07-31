<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión de Consultas VegeBot777</title>
    <link rel="stylesheet" href="index.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"> </script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"> </script>

</head>
<body>
    <header>
        <h1>Bienvenido al Sistema de Gestión de Consultas</h1>
        <p>Chatbot de Grupo 5 - Tanno</p>
    </header>

    <main>
        <section>
            <h2>Conoce a nuestro Chatbot</h2>
            <p>Chatbot "Tanno" sabe demasiado sobre la informática</p>
            <img src="Img/mascota-chatbot.png" alt="Imagen del chatbot" style="width: 200px; height: 200px;">
            <p>Aquí se podrá editar las consultas del chatbot y verlas</p>
        </section>

        <div class="wrapper">
            <div class="title">Chatea con Tanno</div>

            <div class="form">
                <div class="bot-inbox inbox">
                    <div class="icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="msg-header">
                        <p>Hola, ¿cómo puedo ayudarte?</p>
                    </div>
                </div>
            </div>

            <div class="typing-field">
                <div class="input-data">
                    <input id="data" type="text" placeholder="Escribe algo aquí.." required>
                    <button id="send-btn">Enviar</button>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <div>
            <img src="Img/logo.png" style="width: 100px; height: 100px;">
        </div>
        <div>
            <p>Integrantes: Nahuel Schmidt - Garcia Lucia</p>
            <p>&copy; Grupo N°5</p>
            <p>7I - Programación III</p>
        </div>
        <div></div>
    </footer>
</body>
<script>
    $(document).ready(function(){
        $("#send-btn").on("click", function() {
            $valor= $("#data").val(); //tomo el valor guardado en el input y lo guardo el la variable valor
            $msg= '<div class="user-inbox inbox> <div class="msg-header"><p class="TextoEnviado">'+$valor+'</p></div></div>'
            $(".form").append($msg);
            $("#data").val('');
        
            //iniciamos el codigo ajax
            $.ajax ({
                url: 'build/php/respuesta.php',
                type:'POST',
                data: 'text='+ $valor,
                success: function(result){
                    //armo el html con la respuesta que viene del servidor
                    $respuesta='<div class="bot-inbox inbox">'+
                        '<div class="icon"><i class="fas fa-user"></i></div><div class="msg-header">'+
                        '<p>' + result +'</p> </div> </div>';
                    //lo agrego dentro del div cuya clase es form
                    $(".form").append($respuesta);
                    //cuando el chat baja se desplaza haci el final    
                    $(".form").scrollTop($(".form")[0].scrollHeight);

                }
            });
        });
        
    });
</script>
</html>