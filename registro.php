<?php 
    include_once 'config.php';

        //Si el post no está vacío, guarda los valores en la DB
        if(!empty($_POST)){


            $usuario = $_POST['usuario'];
            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellidos'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            //Prerarar sentencia para agregar la nota a la DB 
            $sqlInsert = "INSERT INTO usuarios (usuario, nombre, apellidos, email, contrasena) VALUES ('$usuario','$nombre','$apellidos','$email','$password')";
            print_r($sqlInsert);
            //Ejecución de la sentencia y comrobación correcta de la misma
            try {
                //code...
                if(mysqli_query($conexion, $sqlInsert) === true){
                        header('Location: index.php');
                        session_start();
                        $_SESSION['usuario'] = $usuario;
                    }else{
                        echo 'Error';
                    }
            } catch (Exception $e) {
                //throw $th;
                echo 'Error capturado: ' . $e->getMessage(), "\n";
            }
        }else{
                $message = 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
            }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro</title>
    <link rel="stylesheet" href="/css/styles.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <link rel="icon" type="image/png" href="/public/img/logo.png">
</head>
<body>
    <main class="main">
        <div class="formulario">
            <div class="bgForm">
                <form action="" method="POST">
                    <div class="field has-text-centered">
                        <img src="/public/img/logo.png" alt="">
                    </div>
                    <div class="title has-text-centered">
                        <h1>Ingresa tus datos</h1>
                    </div>
                    <div class="field">
                        <label for="user" class="label">Usuario (max 8 caracteres):</label>
                        <div class="control">
                            <input type="text" name="usuario" class="input" placeholder="Usuario" maxlength="8" required>
                        </div>
                    </div>
                    <div class="field">
                        <label for="user" class="label">Nombre:</label>
                        <div class="control">
                            <input type="text" name="nombre" class="input" placeholder="Usuario" maxlength="50" required>
                        </div>
                    </div>
                    <div class="field">
                        <label for="user" class="label">Apellidos:</label>
                        <div class="control">
                            <input type="text" name="apellidos" class="input" placeholder="Usuario" maxlength="250" required>
                        </div>
                    </div>
                    <div class="field">
                        <label for="user" class="label">Correo electrónico:</label>
                        <div class="control">
                            <input type="email" name="email" class="input" placeholder="Usuario" maxlength="250" required>
                        </div>
                    </div>
                    <div class="field">
                        <label for="user" class="label">Contraseña (min 8 caracteres):</label>
                        <div class="control">
                            <input type="password" name="password" class="input" placeholder="Usuario" minlength="8" maxlength="50" required>
                        </div>
                    </div>
                    <div class="field">
                        <div class="divBtn level-item has-text-centered">
                            <button class="btnBlog" type="submit">Registrarse</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>