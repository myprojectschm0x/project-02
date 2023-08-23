<!-- Section -->
<section id="section">
    <div class="spacing-90px">
    </div>
    <div class="product">
        <?php if ($products->num_rows >= 1) : ?>
            <?php while ($product = $products->fetch_object()) : ?>
                <article class="item text-center">
                    <?php if ($product->thumbnail) : ?>
                        <img src="<?= base_url ?>/uploads/images/<?=$product->thumbnail?>" alt="<?=$product->thumbnail?>">
                    <?php else : ?>
                        <img src="<?= base_url ?>/uploads/images/default.jpg" alt="default">
                    <?php endif; ?>
                    <h2 class=""><a href="/product/show&id=<?= $product->id ?>"><?= $product->name ?></a></h2>
                    <p><span>$<?= $product->price ?>MXN</span></p>
                    <a class="btn-buy" href="/cart/add&product_id=<?=$product->id?>">Comprar</a>
                </article>
            <?php endwhile; ?>
        <?php else : ?>
            <p>¡No hay productos que mostrar!</p>
        <?php endif; ?>
    </div>
</section>