<!-- Aside -->
<aside id="aside">
    <div class="spacing-90px"></div>
    <div id="login" class="block_aside">
        <?php if (!isset($_SESSION['identity'])) : ?>
            <h2 class="subtitle">Login</h2>
            <form action="/user/login" method="POST">
                <label for="mail">Email:</label>
                <input type="email" name="email" id="email" />
                <label for="pwd">Contraseña:</label>
                <input type="password" name="pwd" id="pwd" />
                <input type="submit" value="Entrar" />
            </form>
        <?php else : ?>
            <h3>¡Bienvenido, <?= $_SESSION['identity']->name ?> <?= $_SESSION['identity']->surname ?>!</h3>
        <?php endif; ?>
        <div class="management">
            <ul>
                <?php if ( isset($_SESSION['admin']) ) : ?>
                    <li><a href="#">Gestionar Productos</a></li>
                    <li><a href="#">Gestionar Categorías</a></li>
                    <li><a href="#">Gestionar Pedidos</a></li>
                <?php endif; ?>
                <?php if (isset($_SESSION['identity'])) : ?>
                    <li><a href="#">Mis Pedidos</a></li>
                    <li><a href="/user/logout">Cerrar Sesión</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</aside>