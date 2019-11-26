<?php 
    require_once 'config.php';
    if(!empty($_POST)){
        $usuario_id = ($_POST['usuario_id']);
        $id_nota = ($_POST['id_nota']);
        $active = $_POST['active'];

        if($active == 1){
            $sql = "DELETE FROM favoritos WHERE usuario_id = {$usuario_id} AND nota_id = {$id_nota} LIMIT 1";
            $res = mysqli_query($conexion, $sql);
        }else{
            $sql = "INSERT INTO favoritos (usuario_id, nota_id) VALUES ( {$usuario_id}, {$id_nota})";
            $res = mysqli_query($conexion, $sql);
        }

                echo json_encode($_POST);
    }
?>