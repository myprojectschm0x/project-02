<!-- Aside -->
<aside id="aside">
    <div class="spacing-90px"></div>
    <?php if (isset($_SESSION['identity'])) : ?>
        <div id="cart" class="block_aside">
            <h3>Mi carrito</h3>
            <div class="management">
                <ul>
                    <?php $cart_product = Utils::stats_cart(); ?>
                    <li><a href="/cart/index">Productos (<?=$cart_product['count']?>)</a></li>
                    <li><a href="/cart/index">Total: <strong>$ <?=$cart_product['total']?> MXN ()</strong></a></li>
                    <li><a href="/cart/index">Ver el carrito</a></li>
                </ul>
            </div>
        </div>
    <?php endif; ?>
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
                <?php if (isset($_SESSION['admin'])) : ?>
                    <li><a href="/product/management">Administrar Productos</a></li>
                    <li><a href="/category/index">Administrar Categorías</a></li>
                    <li><a href="/order/management">Administrar Pedidos</a></li>
                <?php endif; ?>
                <?php if (isset($_SESSION['identity'])) : ?>
                    <li><a href="/order/list">Mis Pedidos</a></li>
                    <li><a href="/user/logout">Cerrar Sesión</a></li>
                <?php else : ?>
                    <li>Si no tienes cuenta, <a href="/user/register">¡Registrate ahí!</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</aside>