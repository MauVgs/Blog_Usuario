<?php
    session_start();
    include_once 'config.php';
    
    if(!empty($_SESSION['usuario'])){
        $usuario = $_SESSION['iduser'];
        $usuarioNombre = $_SESSION['usuario'];
    }    

    if(!empty($_POST)){

        $comentario = $_POST['comentario'];
        $id_nota = $_POST['nota'];

        if($comentario === '' || $usuario === ''){
            echo json_encode('error');
        }else{
            $sql = "INSERT INTO comentarios (nota_id, usuario_id, comentario) VALUES ('$id_nota','$usuario','$comentario')";
            $data = mysqli_query($conexion, $sql);
            if(true){
                echo json_encode('Usuario: /' . $usuarioNombre . '/ comentario: /' . $comentario . '/ y nota: /' .$id_nota);
            } 
        }
  
    }

?>