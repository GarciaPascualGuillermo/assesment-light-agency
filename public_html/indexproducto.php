<?php 
require_once(__ROOT__.'\php\routes.php');
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
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
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
						<div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
						Categorias
						</button>
						<ul class="dropdown-menu">
							<?php
							foreach ($clasificacionPadre as $clasificacionPadre) { ?>
							<li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="#" style="color:black;"><?php echo $clasificacionPadre->nombre ?> </a></li>
							<?php } ?>
						</ul>
						</li>
						</div>

                    </ul>
                </div>
            </div>
        </nav>
        <section class="page-section clearfix">
            <div class="container">
                <div class="intro">
                    <img class="intro-img img-fluid mb-3 mb-lg-0 rounded" src="assets/img/computer.jpg" alt="..." />
                    <div class="intro-text left-0 text-center bg-faded p-5 rounded">
                        <h2 class="section-heading mb-4">
                            <span class="section-heading-upper">Light Agency Store</span>
                            <span class="section-heading-lower">Mejores Ofertas</span>
                        </h2>
                        <p class="mb-3">Contamos con una extensa variedad en ofertas para computadores! </p>
                        <div class="intro-button mx-auto"><a class="btn btn-primary btn-xl" href="#!">Visita nuestras ofertas</a></div>
                    </div>
                </div>
            </div>
        </section>
        <section class="page-section cta">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 mx-auto">
                        <div class="cta-inner bg-faded text-center rounded">
                            <h2 class="section-heading mb-4" id="About">
                                <span class="section-heading-upper">“Somos mucho más que una tienda de cómputo”</span>
                                <span class="section-heading-lower">Para ti</span>
                            </h2>
                            <p class="mb-0">Para nosotros lo más importante son siempre nuestros clientes, por eso te brindamos la comodidad y la confianza de poder realizar tus compras en nuestra página web y la opción de poder ver, tocar y probar el producto que deseas en nuestras tiendas físicas. Esperando siempre poder ayudarte y guiarte, si tú lo deseas, en todo tu proceso de compra. Nuestros asesores especializados te ayudarán a seleccionar el mejor equipo para ti, para que te sientas seguro de encontrar exactamente lo que necesitas, de forma sencilla.</p>
                        </div>
						<br>
						<h1 id="Destacados">Productos destacados</h1>
						<br>
						<div style="display:flex; flex-wrap: wrap;" class="card-columns" >
						<?php
						foreach ($destacados as $destacados) { ?>
						<div class="card" style="width:400px">
							<img class="card-img-top" src="assets/img/computadoras/laptop<?php echo rand(1,10)?>.png" alt="Card image" style="width:100%">
							<div class="card-body">
							<h4 class="card-title"><?php echo $destacados->modelo; ?></h4>
							<p class="card-text"><?php echo $destacados->especificaciones;?></p>
							<p class="card-text"><?php echo $destacados->precio;?> $</p>
							<a href="#" class="btn btn-primary">Ver Producto</a>
							</div>
						</div>
						<?php } ?>
						</div>

						<br>
						<h1 id="Vendidos">Productos mas vendidos</h1>
						<br>
						<div style="display:flex; flex-wrap: wrap;" class="card-columns" >
						<?php
						foreach ($vendidos as $vendidos) { ?>
						<div class="card" style="width:400px">
							<img class="card-img-top" src="assets/img/computadoras/compu<?php echo rand(1,10)?>.jpg" alt="Card image" style="width:100%">
							<div class="card-body">
							<h4 class="card-title"><?php echo $vendidos->modelo; ?></h4>
							<p class="card-text"><?php echo $vendidos->especificaciones;?></p>
							<p class="card-text"><?php echo $vendidos->precio;?> $</p>
							<a href="#" class="btn btn-primary">Ver Producto</a>
							</div>
						</div>
						<?php } ?>
						</div>
                    </div>
                </div>
            </div>
        </section>



		
        <footer class="footer text-faded text-center py-5">
            <div class="container"><p class="m-0 small">Copyright &copy; LightAgency 2022</p></div>

          
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
       

    </body>
</html>
