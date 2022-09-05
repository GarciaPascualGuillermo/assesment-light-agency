<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Light Agency - Computer Store</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <link href="../../public_html/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <header>
        <h1 class="site-heading text-center text-faded d-none d-lg-block">
            <span class="site-heading-upper text-primary mb-3">Light Agency</span>
            <span class="site-heading-lower">Computer Store</span>
        </h1>
    </header>
    <!-- Navigation-->

    <nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
        <div class="container">
            <a class="navbar-brand text-uppercase fw-bold d-lg-none" href="index.html">Start Bootstrap</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="index.html">Home</a></li>
                    <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="#About">Sobre Nosotros</a></li>
                    <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="#Destacados">Productos Destacados</a></li>
                    <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="#Vendidos">Productos Mas Vendidos</a></li>
                    <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="indexproducto.php">Productos</a></li>
                    <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="store.html">Categorias</a></li>

                </ul>
            </div>
        </div>
    </nav>

    <section class="page-section cta">
        <div class=" d-flex container justify-content-center">
            <div class="card ">
                <img src="../../public_html/assets/img/computadoras/laptop<?php echo rand(1,10)?>.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $producto->modelo; ?></h5>
                    <p class="card-text"><?php echo $producto->especificaciones; ?></p>
                    <p class="card-text">$<?php echo $producto->precio; ?></p>
                </div>
                <div class="card-body">
                    <button type="button" class="btn btn-dark card-link justify-content-end">Comprar</button>
                </div>
            </div>
        </div>
        
    </section>




    <footer class="footer text-faded text-center py-5">
        <div class="container">
            <p class="m-0 small">Copyright &copy; Your Website 2022</p>
        </div>


    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>

   <? require_once(__ROOT__.'\php\routes.php'); ?>
   <? require_once(__ROOT__.'Master.php'); ?>
</body>

</html>