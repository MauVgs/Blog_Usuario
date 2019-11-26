<?php 
    require_once 'config.php';
    if(!empty($_POST)){
        $fav = ($_POST['fav']);
        $id_nota = ($_POST['id_nota']);
        
            $sql = "UPDATE notas SET favorito = {$fav} WHERE id = '$id_nota'";
            $res = mysqli_query($conexion, $sql);
                echo json_encode($_POST);
    }
?>