<!-- Section -->
<section id="section">
    <div class="spacing-90px">
    </div>
    <div class="product">
        <?php if ($products) : ?>
            <?php while ($product = $products->fetch_object()) : ?>
                <article class="item text-center">
                    <?php if ($product->thumbnail) : ?>
                        <?=$product->thumbnail?>
                        <?php var_dump(file_exists(base_url . '/uploads/images/' . $product->thumbnail)); ?>
                        <?php if (file_exists(base_url . '/uploads/images/' . $product->thumbnail)) : ?>
                            <img src="<?= base_url ?>/uploads/images/<?= $product->thumbnail ?>" alt="<?= $product->name ?>">
                        <?php else : ?>
                            <img src="<?= base_url ?>/uploads/images/default.jpg" alt="default">
                        <?php endif; ?>
                    <?php else : ?>
                        <img src="<?= base_url ?>/uploads/images/default.jpg" alt="default">
                    <?php endif; ?>
                    <h2 class=""><a href="/product/show&id=<?= $product->id ?>"><?= $product->name ?></a></h2>
                    <p><span>$<?= $product->price ?>MXN</span></p>
                    <a class="btn-buy" href="#">Comprar</a>
                </article>
            <?php endwhile; ?>
        <?php else : ?>
        <?php endif; ?>
    </div>
</section>