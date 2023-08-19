<section id="section">
    <?php if ($fetch_product) : ?>
        <?php 
            $item = $fetch_product->fetch_object(); 
        ?>
        <div class="spacing-90px"></div>
        <span>No. <?=$item->id?></span>
        <h2>Editar el producto: <?=$item->name?> </h2>
        <div class="category-create">
            <form action="/product/update" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="product_id" value="<?=$item->id?>" />
                <?php if($fetch_img): ?>
                    <?php $img = $fetch_img->fetch_object() ?>
                    <input type="hidden" name="current_img" value="<?=$img->thumbnail?>" />
                <?php endif; ?>
                <label for="name">Nombre:</label>
                <input type="text" name="name" id="name" value="<?=$item->name?>" required />

                <label for="category">Categoría:</label>
                <select name="category" id="category" required>
                    <option value="null" selected>Seleccionar...</option>
                    <?php $categories = Utils::listCategory(); ?>
                    <?php if (isset($categories)) : ?>
                        <?php while ($category = $categories->fetch_object()) : ?>
                            <option value="<?= $category->id ?>" 
                            <?=$category->id == $item->category_id ? 'selected' : ''?>  
                            >
                                <?= $category->name ?>
                            </option>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </select>

                <label for="desc">Descripción:</label>
                <textarea name="desc" id="desc" cols="30" rows="10"><?=$item->description?></textarea>

                <label for="price">Precio:</label>
                <input type="number" name="price" id="price" required value="<?=$item->price?>" />

                <label for="stock">Stock:</label>
                <input type="number" name="stock" id="stock" value="<?=$item->stock?>" required />

                <label for="discount">Descuento(porcentaje):</label>
                <input type="number" name="discount" id="discount" step="0.01" value="<?=$item->stock?>" />

                <label for="thumbnail">Imagen</label>
                <input type="file" name="thumbnail" accept="image/png, image/jpeg, image/jpg"/>
                <!-- <input type="text" name="thumbnail" id="thumbnail" /> -->

                <input type="submit" value="Crear un producto" />
            </form>
        </div>
    <?php else : ?>
        <p>¡Hubo algún error, vuelve a la página!</p>
        <p><a href="/product/management">Administrar el product</a></p>
    <?php endif; ?>
</section>