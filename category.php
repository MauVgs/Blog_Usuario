<?php
    require_once 'config.php';
    session_start();

    $id = $_GET['id'];


    //Preparar sentencias para consultar información en DB
    $sqlCategoria = "SELECT * FROM categorias WHERE borrado = 0";
    $sqlNota = "SELECT * FROM notas WHERE categoria_id = '$id'";

    //Ejecución de sentencias SQL para el pintado del Front

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
    <title>Categorías</title>
    <link rel="stylesheet" href="/css/styles.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <link rel="stylesheet" href="https://use.typekit.net/vcy1rfg.css">
    <link rel="icon" type="image/png" href="/public/img/logo.png">
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
                        <li><a href="/cerrarSesion.php" class="Cerrar sesión">Cerrar sesión</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </header>

    <main class="main">
        <div class="has-text-centered flex">
        <?php foreach($resultNota as $item): ?>
            <a href="/detalles.php?id=<?php echo $item[0] ?>"><div class="articulo">
                <div class="imgDetArtic image">
                    <img src="<?php echo $pathImage . "public/img/" . $item[3]; ?>" alt="">
                    <div class="title">
                        <h1><?php echo $pathImage . "public/img/" . $item[1]; ?></h1>
                    </div>
                </div>
                <div class="introDetArtic">
                    <h2><?php echo $pathImage . "public/img/" . $item[2]; ?></h2>
                </div>
            </div></a>
        <?php endforeach; ?>
        </div>

    </main>
</body>
</html>