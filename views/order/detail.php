<section id="section">
    <div class="spacing-90px">
    </div>
    <div class="category-create">
        <h3>Dirección del envio:</h3>
        <p>Localidad: <?=$getOrder->location?></p>
        <p>Dirección: <?=$getOrder->address?></p>
        <br/>
        <h3>Datos del Pedido:</h3>
        <p>Número del pedido:<?= $getOrder->id ?></p>
        <p>Total a pagar: <small>$<?=$getOrder->total_price?> MXN</small></p>
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
                        <td><?=$product->name?></td>
                        <td><?=$product->price?></td>
                        <td><?=$product->unity?></td>
                    </tr>
                <?php endwhile; ?>
                <tr>
                </tr>
            </table>
        <?php endif; ?>
    </div>
</section>