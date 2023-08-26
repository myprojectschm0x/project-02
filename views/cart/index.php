<section id="section">
    <div class="spacing-90px">
    </div>
    <div class="list">
        <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0  ) : ?>
            <table>
                <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Unidades</th>
                    <th>Precio</th>
                    <th>Acción</th>
                </tr>
                <?php foreach ($cart as $index => $item) :
                    $item_obj = $item['product'];
                ?>
                    <tr>
                        <td>
                            <?php if ($item_obj->thumbnail && $item_obj->thumbnail != '') : ?>
                                <img class="cart_img" src="<?= base_url ?>/uploads/images/<?= $item_obj->thumbnail ?>" alt="<?= $item_obj->thumbnail ?>" />
                            <?php else : ?>
                                <img class="cart_img" src="<?= base_url ?>/uploads/images/default.jpg" alt="default_image" />
                            <?php endif; ?>
                        </td>
                        <td><a href="/product/show&id=<?= $item_obj->id ?>"><?= $item_obj->name ?></a></td>
                        <td>
                            <a href="/cart/up&index=<?=$index?>" class="btn btn-unity">+</a>
                            <?= $item['unity'] ?>
                            <a href="/cart/down&index=<?=$index?>" class="btn btn-unity">-</a>
                        </td>
                        <td><?= $item['price'] ?></td>
                        <td><a class="btn btn-danger remove-item" href="/cart/remove&index=<?=$index?>">Eliminar</a></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td><strong>Total</strong></td>
                    <?php $stats = Utils::stats_cart(); ?>
                    <td>$<strong><?=$stats['total']?></strong></td>
                </tr>
            </table>
            <a class="btn btn-danger f-right btn-cart mt-20 ml-20" href="/cart/delete_all">Vaciar el carrito</a>
            <a class="btn btn-green f-right btn-cart mt-20" href="/order/index">Continuar con el pedido</a>
            <div class="clear-fix"></div>
        <?php else: ?>
            <p>¡El carrito está vacío, visita nuestro productos que pueda interesar!</p>
            <a class="link-product" href="/">Productos</a>
        <?php endif; ?>
    </div>

</section>