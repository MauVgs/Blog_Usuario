<?php
    include_once 'config.php';
    session_start();
    $usuario = $_SESSION['iduser'];

    //Preparar sentencias para consultar información en DB
    $sqlCategoria = 'SELECT * FROM categorias WHERE borrado = 0';
    $sqlNota = 'SELECT * FROM notas';
    $datosFav = "SELECT nota_id FROM favoritos WHERE usuario_id = '$usuario'"; 

    //Ejecución de sentencias SQL para el pintado del Front

    //Favoritos
    $fav = mysqli_query($conexion, $datosFav);
    $resultFavoritos = mysqli_fetch_all($fav);

    $arrayFav = [];
    $c = 0;
    foreach($resultFavoritos as $ele){
        $arrayFav[$c] = $ele[0];
        $c++;
    }
    //Categorias
    $dataCategoria = $query = mysqli_query($conexion, $sqlCategoria);
    $resultCategoria = mysqli_fetch_all($dataCategoria);
    //var_dump($resultCategoria);

    //Notas
    $dataNota = $query = mysqli_query($conexion, $sqlNota);
    $resultNota = mysqli_fetch_all($dataNota);
    //var_dump($resultNota);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/css/styles.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <link rel="stylesheet" href="https://use.typekit.net/vcy1rfg.css">
    <link rel="icon" type="image/png" href="/public/img/logo.png">
    <link href="https://fonts.googleapis.com/css?family=Calistoga&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
  rel="stylesheet">
</head>
<body>
    <header>
        <div class="navBarHome space">
            <div>
                <a href="/index.php"><img src="/public/img/logo.png" alt="Techies Blog" class="logo"></a>
            </div>
            <div class="navbar-menu">
                <ul>
                    <?php foreach($resultCategoria as $item): ?>
                        <li><a href="/category.php?id=<?php echo $item[0]?>"><?php print_r(strtoupper($item[1]));?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="navbar-menu">
                <ul>
                    <?php if(empty($_SESSION['usuario'])): ?>
                        <li><a href="/logIn.php" class="Cerrar sesión">Iniciar sesión</a></li>
                        <li><a href="/registro.php" class="Cerrar sesión">Registrarse</a></li>
                    <?php else: ?>
                        <li><a href="/favoritos.php" class="Cerrar sesión">Favoritos</a></li>
                        <li><a href="/cerrarSesion.php" class="Cerrar sesión">Cerrar sesión</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </header>
    <?php if(!empty($_SESSION['usuario'])): ?>
        <h1 class="msgWelcome">BIENVENIDO: <strong><?php print_r(strtoupper($_SESSION['usuario']));?></strong></h1>
    <?php endif; ?>
    <main class="main">
        <section class="posArticulo">
                <?php foreach ($resultNota as $item): ?>
                    <article class="articulo" style="
                    background-image: url('<?php echo $pathImage . "public/img/" . $item[3]; ?>');
                    background-position: top center;
                    background-size: 100% auto;
                    background-repeat: no-repeat;
                    position: relative;">
                        <a href="/detalles.php?id=<?php echo $item[0]; ?>">
                            <div class="titleArticle">
                                <h6><?php echo $item[1]; ?></h6>
                            </div>
                            <div class="infoArticle">
                                <p><?php echo $item[5]; ?></p>
                            </div>
                        </a>
                        <div class="favorito">
                            <div class="iconFav">
                                <i class="material-icons apagado_<?php echo $item[0] ?> <?php if(in_array($item[0], $arrayFav)) echo 'corazonRojo';?>" name="<?php if(in_array($item[0], $arrayFav)) echo 'on'; else echo 'off';  ?>" onclick="getLike(<?php echo $item[0] ?>, <?php  echo $usuario ?>)" id="like<?php echo $item[0] ?>">favorite</i>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
        </section>
    </main>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="/js/index.js"></script>
</body>
</html>