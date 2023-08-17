<section id="section" class="list_block">
    <h2 class="subtitle2">Administrar Productos</h2>
    <div class="list">
        <p>
            <a class="" href="/product/create">Crear un producto.</a>
        </p>
        <?php if ($products->num_rows > 1) : ?>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Categoría</th>
                    <th>Nombre</th>
                    <th>Description</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Descuento</th>
                    <th>Imagen</th>
                    <th>Fecha</th>
                    <th>Acción</th>
                </tr>


                <?php while ($product = $products->fetch_object()) : ?>
                    <tr>
                        <td><?= $product->id ?></td>
                        <td><?= $product->category ?></td>
                        <td><?= $product->name ?></td>
                        <td><?= substr($product->description, 0, 15) . '...'; ?></td>
                        <td><?= $product->price ?></td>
                        <td><?= $product->stock ?></td>
                        <td><?= $product->discount ?></td>
                        <td><?= $product->thumbnail ?></td>
                        <td><?= $product->date ?></td>
                        <td>Editar, Borrar</td>
                    </tr>
                <?php endwhile; ?>
            </table>
        <?php else : ?>
            <p>¡No hay productos que mostrar!</p>
        <?php endif; ?>
    </div>
</section>