<!-- Section -->
<section id="section">
    <div class="spacing-90px"></div>
    <div class="product-show">
        <?php if ($fetch_product->num_rows == 1) : ?>
            <?php $item = $fetch_product->fetch_object(); ?>
            <h2><?= $item->name ?></h2>
            <div class="central-img">
                <?php if ($item->thumbnail && $item->thumbnail != '') : ?>
                    <img src="<?= base_url ?>/uploads/images/<?= $item->thumbnail ?>" alt="<?= $item->name ?>" />
                <?php else : ?>
                    <img src="<?= base_url ?>/assets/img/default.jpg" alt="<?= $item->name ?>" />
                <?php endif; ?>
            </div>
            <p><span><?= $item->category_name ?></span> | <span><?= $item->date ?></span></p>
            <p>Precio: $<?= $item->price ?> <strong>MXN</strong></p>
            <p>Stock: <?= $item->stock ?></p>
            <p>Descripción:</p>
            <textarea name="desc" cols="30" rows="10" disabled><?= $item->description ?></textarea>

            <?php if (isset($_SESSION['admin']) && $_SESSION['admin']) : ?>
                <a class="btn btn-green" href="/product/edit&id=<?= $item->id ?>">Editar</a>
                <a class="btn btn-danger" href="/product/delete&id=<?= $item->id ?>">Borrar</a>
                <a class="btn-buy btn-show" href="/cart/add&product_id=<?=$item->id?>">Comprar</a>
            <?php else : ?>
                <a class="btn-buy btn-show" href="/cart/add&id=<?=$item->id?>">Comprar</a>
            <?php endif; ?>
        <?php else : ?>
            <p>¡No existe tal producto, lo sentimos!</p>
        <?php endif; ?>
    </div>
</section>