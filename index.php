<?php 

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
</head>
<body>
    <header>
        <div class="navBarHome">
            <div>
                <a href="/index.php"><img src="/public/img/logo.png" alt="Techies Blog" class="logo"></a>
            </div>
            <div class="dropdown is-hoverable ml">
                <div class="dropdown-trigger">
                    <button class="button" aria-haspopup="true" aria-controls="dropdown-menu4">
                    <span class="has-text-info">Categorías</span>
                    <span class="icon is-small">
                        <i class="fas fa-angle-down" aria-hidden="true"></i>
                    </span>
                    </button>
                </div>
                <div class="dropdown-menu" id="dropdown-menu4" role="menu">
                    <div class="dropdown-content">
                    <div class="dropdown-item">
                        <a href="/category.php"><span class="has-text-info">Categoria 1</span></a>
                    </div>
                    <div class="dropdown-item">
                        <a href="/category.php"><span class="has-text-info">Categoria 2</span></a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="main">
        <section class="posArticulo">
                <article class="articulo">
                    <div class="icon">
                        <img src="" alt="">
                    </div>
                    <div class="titleArticle">
                        <h6>Peace of Mind</h6>
                    </div>
                    <div class="infoArticle">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Cras ultrices accumsan ornare. Phasellus tristique</p>
                    </div>
                </article>
                <article class="articulo">
                    <div class="icon">
                        <img src="" alt="">
                    </div>
                    <div class="titleArticle">
                        <h6>Peace of Mind</h6>
                    </div>
                    <div class="infoArticle">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Cras ultrices accumsan ornare. Phasellus tristique</p>
                    </div>
                </article>
                


        </section>
    </main>
</body>
</html>