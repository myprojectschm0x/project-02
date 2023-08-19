<!-- Section -->
<section id="section">
    <div class="spacing-90px"></div>
    <div class="product-show">
        <?php if ($fetch_product) : ?>
            <?php $item = $fetch_product->fetch_object(); ?>
            <h2><?= $item->name ?></h2>
            <div class="central-img">
                <?php if ($item->thumbnail) : ?>
                    <img src="<?=base_url?>/uploads/images/<?=$item->thumbnail?>" alt="<?= $item->name ?>" /> 
                <?php else : ?>
                    <img src="<?= base_url ?>/uploads/images/default.jpg" alt="<?= $item->name ?>" />
                <?php endif; ?>
            </div>
            <p><span><?= $item->category_name ?></span> | <span><?= $item->date ?></span></p>
            <p>Precio: $<?= $item->price ?> <strong>MXN</strong></p>
            <p>Stock: <?= $item->stock ?></p>
            <textarea name="desc" cols="30" rows="10" disabled><?= $item->description ?></textarea>
        <?php endif; ?>
    </div>
</section>