<?php 
    require_once 'config.php';
    
    session_start();

    
    if(!empty($_SESSION['usuario'])){
        $usuario = $_SESSION['iduser'];
    }    
    $id = $_GET['id'];
    
    //Ejecución de sentencia para pintar datos de la nota
    $sql = "SELECT * FROM notas WHERE id = '$id'";
    $info = $query = mysqli_fetch_all(mysqli_query($conexion, $sql));
    //Ejecución de la sentencia que pinta los comentarios
    $sqlCom = "SELECT c.*, (SELECT nombre FROM usuarios WHERE  id = c.usuario_id) as usuario_nota FROM comentarios c WHERE nota_id = '$id'";
    $infoCom = $query = mysqli_fetch_all(mysqli_query($conexion, $sqlCom));

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Categorías</title>
    <link rel="stylesheet" href="/css/styles.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <link rel="stylesheet" href="https://use.typekit.net/vcy1rfg.css">
    <link rel="icon" type="image/png" href="/public/img/logo.png">
</head>
<body>
    <header>
        <div class="navBar">
            <div>
                <a href="/index.php"><img src="/public/img/logo.png" alt="Techies Blog" class="logo"></a>
            </div>
            <div class="divBack">
                <a href="/category.php?id=<?php print_r($info[0][4]) ?>" ><label class="back">Volver</label></a>
            </div>
        </div>
    </header>
    <main class="main">
        <div class="title2 has-text-centered">
            <h1><?php print_r($info[0][1]); ?></h1>
        </div>
        <div class="autorDetArt">
            <p>Por: <?php print_r($info[0][6]); ?></p>
        </div>
        <div class="has-text-centered flex" id="deta">
                
            <div class="detalleInfo flex2">
                <div class="imgDetArtic image">
                    <img src="<?php echo $pathImage . "public/img/" . $info[0][3]; ?>" alt="">
                </div>
                
                <div class="introDetArtic">
                    <h2><?php print_r($info[0][2]); ?></h2>
                </div>
                <div class="contDetArtic">
                    <p>
                    <?php print_r($info[0][5]); ?>
                    </p>
                </div>
                
                <div class="fechaDetArtic">
                    <p>Publicado el : <?php print_r($info[0][7]); ?></p>
                </div>
            </div>

            <div class="detalleComentarios">

                <div class="areaComentarios" id="scroll">

                    <div class="commentDetArtic" id="alto">
                        <div class="title">
                            <br>
                            <h1>Comentarios:</h1>
                        </div>
                        <div id="comentario">
                            <?php if(!empty($infoCom)) ?>
                                <?php foreach($infoCom as $item): ?>
                                    <div class="areaComentario">
                                        <div class="comentario">
                                            <p>
                                                <?php print_r($item[3]); ?>
                                            </p>
                                        </div>
                                        <div class="comentario">
                                            <br>
                                            <p><strong>Por: <?php print_r($item[4]); ?></strong></p>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php if(empty($infoCom)): ?>
                                <div class="areaComentario" id="hide">
                                    <div class="comentario">
                                        <p>
                                            Sin comentarios.
                                        </p>
                                    </div>
                                </div>
                            <?php endif; ?> 
                        </div>   
                    </div>
                </div>

                <br>
                <?php if(!empty($_SESSION['usuario'])): ?>
                    <form class="addComentario" id="formulario" method="POST">
                    <input id="usuario" name="usuario" type="hidden" value="<?php echo ($usuario); ?>">
                    <input id="nota" name="nota" type="hidden" value="<?php echo ($id); ?>">
                        <textarea name="comentario" id="areaComentario" class="textarea" placeholder="Agrega tu comentario"></textarea>
                        <br>
                        <button type="submit" class="button">Comentar</button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="/js/main.js"></script>
</body>
</html>