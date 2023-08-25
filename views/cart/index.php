<section id="section">
    <div class="spacing-90px">
    </div>
    <div class="list">
        <?php if (isset($cart)) : ?>
            <table>
                <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Unidades</th>
                    <th>Precio</th>
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
                        <td><?= $item['unity'] ?></td>
                        <td><?= $item['price'] ?></td>
                        <td></td>
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
            <a class="btn btn-danger f-right btn-cart" href="/order/index">Continuar con el pedido</a>
            <a class="btn btn-green f-right btn-cart" href="/order/index">Continuar con el pedido</a>
            <div class="clear-fix"></div>
        <?php else: ?>
            <p>¡No hay productos que mostrar!</p>
        <?php endif; ?>
    </div>

</section>