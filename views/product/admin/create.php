<section id="section">
    <div class="spacing-90px"></div>
    <h2>Crear un nuevo producto</h2>
    <div class="category-create">
        <?php if( isset($_SESSION['product'])): ?>
            <?php if($_SESSION['product'] == 'successful' ): ?>
                <span>¡Producto guardando con éxito!</span>
            <?php elseif($_SESSOIN['product'] == 'failed_to_save' ): ?>
                <span>¡Algo fallo al guardar, por favor intentar de nuevo!</span>
            <?php elseif( $_SESSOIN['product'] == 'failed_form' ): ?>
                <span>Verifica y completa el formulario, por favor.</span>
            <?php elseif( $_SESSION['product'] == 'error'): ?>
                <span>¡Ha habido un error, favor de intentar de nuevo!</span>
            <?php endif; ?>
        <?php endif; ?>
        <?php Utils::deleteSession('product');  ?>
        <form action="/product/save" method="POST">
            <label for="name">Nombre:</label>
            <input type="text" name="name" id="name" required />

            <label for="category">Categoría:</label>
            <select name="category" id="category">
                <option value="null" selected>Seleccionar...</option>
                <?php if(isset($categories)): ?>
                    <?php while($category = $categories->fetch_object()): ?>
                        <option value="<?=$category->id?>"><?=$category->name?></option>
                    <?php endwhile; ?>
                <?php endif; ?>
            </select>

            <label for="desc">Descripción:</label>
            <textarea name="desc" id="desc" cols="30" rows="10"></textarea>

            <label for="price">Precio:</label>
            <input type="number" name="price" id="price" />

            <label for="stock">Stock:</label>
            <input type="number" name="stock" id="stock" />

            <label for="discount">Descuento(porcentaje):</label>
            <input type="number" name="discount" id="discount" step="0.01"  />

            <label for="thumbnail">Imagen</label>
            <input type="text" name="thumbnail" id="thumbnail" />

            <input type="submit" value="Crear un producto" />
        </form>
    </div>

</section>    