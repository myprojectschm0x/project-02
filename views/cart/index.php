<section id="section">
    <div class="spacing-90px">
    </div>
    <div class="list">
        <?php if (isset($cart)) : ?>
            <table>
                <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Unidades</th>
                    <th>Total</th>
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
                        <td><?= $item['price'] ?></td>
                        <td><?= $item['unity'] ?></td>
                        <td>$0MXN</td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>¡No hay productos que mostrar!</p>
        <?php endif; ?>
    </div>

</section>