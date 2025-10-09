<?php
session_start();

// Si no hay sesión iniciada, redirige al login
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

// Si se presiona el botón de logout
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión de Consultas VegeBot777</title>
    <link rel="stylesheet" href="index.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
    <header>
        <h1>Bienvenido al Sistema de Gestión de Consultas</h1>
        <p>Chatbot de Grupo 5 - Tanno</p>
        <a href="index.php?logout=true" class="logout-btn">Cerrar sesión</a>
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

    <style>
        .logout-btn {
            background-color: #e74c3c;
            color: white;
            padding: 8px 15px;
            text-decoration: none;
            border-radius: 5px;
            float: right;
            margin-top: -40px;
        }
        .logout-btn:hover {
            background-color: #c0392b;
        }
    </style>

    <script>
        $(document).ready(function(){
            $("#send-btn").on("click", function() {
                let valor = $("#data").val(); 
                let msg = '<div class="user-inbox inbox"><div class="msg-header"><p class="TextoEnviado">'+valor+'</p></div></div>';
                $(".form").append(msg);
                $("#data").val('');
            
                $.ajax({
                    url: 'RespuestaCRUD/respuesta.php',
                    type:'POST',
                    data: { text: valor },
                    success: function(result){
                        let respuesta = '<div class="bot-inbox inbox">'+
                            '<div class="icon"><i class="fas fa-user"></i></div><div class="msg-header">'+
                            '<p>' + result +'</p></div></div>';
                        $(".form").append(respuesta);
                        $(".form").scrollTop($(".form")[0].scrollHeight);
                    }
                });
            });
        });
    </script>
</body>
</html>
