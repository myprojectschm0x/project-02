<section id="section">
    <div class="spacing-90px">
    </div>
    <div class="category-create">
        <?php if (isset($_SESSION['admin'])) : ?>
            <h3>Cambiar el estado del pedido</h3>
            <form action="/order/update_delivery_status" method="POST">
                <input type="hidden" name="order_id" value="<?=$getOrder->id?>" />
                <select name="delivery_status">
                    <option value="waiting" <?=$getOrder->delivery_status == 'waiting' ? 'selected' : '' ?> >Pendiente</option>
                    <option value="preparation" <?=$getOrder->delivery_status == 'preparation' ? 'selected' : '' ?>>En preparación</option>
                    <option value="ready" <?=$getOrder->delivery_status == 'ready' ? 'selected' : '' ?>>Preparado para enviar</option>
                    <option value="sended" <?=$getOrder->delivery_status == 'sended' ? 'selected' : '' ?>>Enviado</option>
                    <option value="delivered" <?=$getOrder->delivery_status == 'delivered' ? 'selected' : '' ?>>Entregado</option>
                </select>
                <input type="submit" value="Actualizar el estado" />
            </form>
            <br/>
        <?php endif; ?>
        <h3>Dirección del envio:</h3>
        <p>Status: <?=Utils::show_status($getOrder->delivery_status)?></p>
        <p>Localidad: <?= $getOrder->location ?></p>
        <p>Dirección: <?= $getOrder->address ?></p>
        <br />
        <h3>Datos del Pedido:</h3>
        <p>Número del pedido:<?= $getOrder->id ?></p>
        <p>Total a pagar: <small>$<?= $getOrder->total_price ?> MXN</small></p>
        <p>Productos:</p>
        <?php if (isset($products)) : ?>
            <table>
                <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                </tr>
                <!-- POn while -->
                <?php while ($product = $products->fetch_object()) : ?>
                    <tr>
                        <td>
                            <?php if ($product->thumbnail && $product->thumbnail != '') : ?>
                                <img class="cart_img" src="<?= base_url ?>/uploads/images/<?= $product->thumbnail ?>" alt="<?= $product->thumbnail ?>" />
                            <?php else : ?>
                                <img class="cart_img" src="<?= base_url ?>/uploads/images/default.jpg" alt="default_image" />
                            <?php endif; ?>
                        </td>
                        <td><?= $product->name ?></td>
                        <td><?= $product->price ?></td>
                        <td><?= $product->unity ?></td>
                    </tr>
                <?php endwhile; ?>
                <tr>
                </tr>
            </table>
        <?php endif; ?>
    </div>
</section>