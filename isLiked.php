<?php
    require_once 'config.php';
    if(!empty($_POST)){
        $id_nota = $_POST['id_nota'];
        $id_user = $_POST['id_user'];
        //Se agrega la nota a la tabla de favoritos
        $sql = "INSERT INTO favoritos (usuario_id, nota_id) VALUES ('$id_user', '$id_nota')";
        $data = mysqli_query($conexion, $sql);
        if($data){
            echo json_encode($_POST);
        }else{
            echo json_encode('Elerror');
        }
        
    }else{
        $sql = "DELETE FROM favoritos WHERE usuario_id = $id_user AND nota_id = $id_nota";
        $data = mysqli_query($conexion, $sql);
        if($data){
            echo json_encode($_POST);
        }else{
            echo json_encode('error');
        }
        
        
    }
?>