<section id="section">
    <div class="spacing-90px">
    </div>
    <div class="product">
        <?php if ($products->num_rows > 0) : ?>
            <?php while ($product = $products->fetch_object()) : ?>
                <article class="item text-center">
                    <img src="./assets/img/playera.jpg" alt="Playera">
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