<?php if (isset($_SESSION['product']['delete']) && $_SESSION['product']['delete'] == 'successful') :  ?>
    <span>¡Producto eliminado con éxito!</span>
<?php elseif (isset($_SESSION['product']['delete']) && $_SESSION['product']['delete'] == 'failed') : ?>
    <span>Hubo un fallo, ¡vuelva a intentar, por favor!</span>
<?php endif; ?>
<?php Utils::deleteSession('product', 'delete'); ?>
<?php if (isset($_SESSION['product']['update']) && $_SESSION['product']['update'] == 'successful') : ?>
    <span>¡Producto Actualizado con Éxito!</span>
<?php endif; ?>
<?php Utils::deleteSession('product', 'update') ?>