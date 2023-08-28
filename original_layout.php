<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto 2: Shop</title>
    <link rel='stylesheet' type='text/css' href='./assets/css/styles.css' />
</head>

<body>
    <div id="container">

        <!-- Header -->
        <header id="header">
            <div id="logo">
                <img src="assets/img/terminal_logo.png" alt="terminal Logo" />
                <a href="#">Shop</a>
            </div>
        </header>
        <!-- NavMenu -->
        <nav id="menu">
            <ul>
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Categoria 1</a></li>
                <li><a href="#">Categoria 2</a></li>
                <li><a href="#">Categoria 3</a></li>
            </ul>
        </nav>
        <!-- Content/Main -->
        <div id="main">
            <!-- Aside -->
            <aside id="aside">
                <div class="spacing-90px"></div>
                <div id="login" class="block_aside">
                    <h2 class="subtitle">Login</h2>
                    <form action="#" method="POST">
                        <label for="mail">Email:</label>
                        <input type="email" name="mail" id="mail" />
                        <label for="pwd">Contraseña:</label>
                        <input type="password" name="pwd" id="pwd" />
                        <input type="submit" value="Entrar" />
                    </form>
                    <div class="management">
                        <ul>
                            <li><a href="#">Mis Pedidos</a></li>
                            <li><a href="#">Gestionar Pedidos</a></li>
                            <li><a href="#">Gestionar Categorías</a></li>
                        </ul>
                    </div>
                </div>
            </aside>
            <!-- Section -->
            <section id="section">
                <div class="spacing-90px">
                </div>
                <div class="product">
                    <article class="item text-center">
                        <img src="./assets/img/playera.jpg" alt="Playera">
                        <h2 class="">Playera</h2>
                        <p><span>$120 MXN</span></p>
                        <a class="btn-buy" href="#">Comprar</a>
                    </article>
                    <article class="item text-center">
                        <img src="./assets/img/playera.jpg" alt="Playera">
                        <h2 class="">Playera</h2>
                        <p><span>$120 MXN</span></p>
                        <a class="btn-buy" href="#">Comprar</a>
                    </article>
                    <article class="item text-center">
                        <img src="./assets/img/playera.jpg" alt="Playera">
                        <h2 class="">Playera</h2>
                        <p><span>$120 MXN</span></p>
                        <a class="btn-buy" href="#">Comprar</a>
                    </article>
                    <article class="item text-center">
                        <img src="./assets/img/playera.jpg" alt="Playera">
                        <h2 class="">Playera</h2>
                        <p><span>$120 MXN</span></p>
                        <a class="btn-buy" href="#">Comprar</a>
                    </article>
                </div>
            </section>
        </div>
        <!-- Footer -->
        <footer id="footer">
            <p>Desarrollado por José María &copy; <?= date('Y') ?></p>
        </footer>
    </div>
</body>

</html>