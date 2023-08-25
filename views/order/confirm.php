<section id="section">
    <div class="spacing-90px">
    </div>
    <div class="category-create">
        <?php if (isset($_SESSION['order']) && $_SESSION['order'] == "confirm") : ?>
            <h3>¡Tu pedido se ha confirmado!</h3>
            <p>
                Tu pedido ha sido guardada con éxito, una vez que realices la transferencia
                bancaria con el coste del pedido, será procesado y enviado.
            </p>
            <h3>Datos del Pedido:</h3>
            <?php if (isset($getOrder)) : ?>
                <p>Número del pedido:<?= $getOrder->id ?></p>
                <p>Total a pagar:<?= $getOrder->total_price ?></p>
                <p>Productos:</p>
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
                            <td><a href="/product/show&id=<?= $product->id ?>"><?= $product->name ?></a></td>
                            <td><?= $product->price ?></td>
                            <td><?= $product->unity ?></td>
                        </tr>
                        <!-- el endwhile -->
                    <?php endwhile; ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><strong>Total</strong></td>
                        <?php $stats = Utils::stats_cart(); ?>
                        <td>$<strong><?= $stats['total'] ?></strong></td>
                    </tr>
                </table>
            <?php endif; ?>
        <?php elseif (isset($_SESSION['order']) && $_SESSION['order'] == "failed") : ?>
            <p>¡Tu pedido no ha podido procesarse!</p>
        <?php endif; ?>
    </div>
</section>